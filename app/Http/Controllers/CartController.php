<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Auth;
use Mail;
use App\Mail\TestMail; 
use App\Helper\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user()->id;
        $products = Product::get();

        $carts = Cart::pluck('qty');
        $total_qty = 0;
        foreach($carts as $cart){
            $total_qty  = $total_qty + $cart;
        }
        return view('cart.index', compact('products', 'total_qty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::user()->id;
        // dd($user_id); 
        if(empty($request->qty)){
            $request->qty = 1;
        }
        $total_amount = (int) $request->price * (int) $request->qty;
     
        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->prod_id = $request->prod_id;
        $cart->price = $request->price;
        $cart->total_amount = $total_amount;
        $cart->qty = $request->qty;
        $cart->status = 0;
        // dd($request->total_qty);
        $cart->save();

        $carts = Cart::pluck('qty');
        $total_qty = 0;
        foreach($carts as $cart){
            $total_qty  = $total_qty + $cart;
        }
        return response()->json($total_qty);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        //
        $id = $request->prod_id;
        // dd($id);
        $products = Product::where('id',$id)->get();
        // dd($products);
        $html = view('cart.list', compact('products'))->render();
        // dd($html);
        return response()->json($html);
        // return view('cart.list', compact('products'));
    }

    public function total()
    {
        // $products = Product::get();
        
        // $carts = DB::select("SELECT products.id, products.prodname, products.price, products.image, carts.qty, carts.total_amount, carts.price FROM products INNER JOIN users ON products.id = users.id INNER JOIN carts ON products.id = carts.prod_id WHERE carts.status = 0");
        // $subtotal = 0;
        // foreach($carts as $cart){
        //     $subtotal  = $cart->price * $cart->qty + $subtotal;
        // }
        $carts = Cart::leftjoin('users','users.id','carts.user_id')
                ->leftjoin('products','products.id','carts.prod_id')
                ->where('carts.status',Cart::PENDING)
                ->where('carts.user_id',auth()->user()->id)
                ->select('carts.*','products.prodname','products.price','products.image')
                ->get();

            $subtotal = 0;
            $total_qty = 0;
            foreach($carts as $cart){
                $subtotal  = $cart->price * $cart->qty + $subtotal;
                $total_qty  = $total_qty + $cart->qty;
            }
               
        return view('cart.total', compact('carts','subtotal','total_qty'));
        // alert('hello');
    }

    public function remove($id)
    {
        $cart = Cart::find($id)->delete();
        return redirect()->route('cart.total');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {  
        // dd("hre",$request->all());
        $request->validate([
            'address' => 'required',
            'contact' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);

        $products = Cart::join('products', 'products.id', 'carts.prod_id')
                        ->join('users', 'carts.user_id', 'users.id')
                        ->select('products.prodname', 'products.image', 'users.name', 'users.email', 'products.price', 'carts.prod_id', 'carts.qty', 'carts.total_amount','carts.id')
                        ->where('carts.status',0)
                        ->get();
        // dd($products->toArray());

        foreach($products as $product){
            
            $orders = OrderDetails::getOrderDetails($product, $request);
            // dd($orders);
        }

        $updateCart = Cart::where('user_id', auth()->user()->id)->update(['status' => 1]);

        // $name = Auth::user()->name;
        // $email = Auth::user()->email;
        // // dd($name, $email);

        // $data = array('name' => Auth::user()->name, "body" => "A testing mail"); 

        // $mail = Mail::send('emails.mail', ['data' => $data], function($message) use ($name, $email) {
        //     $message->to($email, $name) 
        //             ->subject('DS Shop Test Mail');
        //     $message->from('dhruv1.elsner@gmail.com', 'DS Shop');
        // });
        // dd($mail);

        return redirect()->route('cart.index')->with('success', 'Email sent successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */

    public function updateStatus(Request $request)
    {
        $updateOrder = Order::where('id', $request->id)
                                ->update(['status' => $request->status]);

        if($request->status == 0)
        {
            return response()->json(array('success' => true, 'message' => 'Order Pending'));
        }
        else
        {
            $details = [
                'title' => 'Your order is Confirm and ready for dispatch',
                'body' => 'DS Shop Testing Mail using SMTP'
            ];

            Mail::send('emails.TestMail', $details, function($message) {
                $message->to('dhruvshah@mailinator.com')
                        ->subject('DS Shop Testing Mail');
                $message->from('dhruv1.elsner@gmail.com','DS Shop');
            });
            return response()->json(array('success' => true, 'message' => 'Order Confirmed'));
        }
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Item added to the cart successfully');
        }
    }
}