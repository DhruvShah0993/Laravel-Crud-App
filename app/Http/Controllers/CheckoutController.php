<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Datatables;
use App\Models\Cart;
use Yajra\DataTables\DataTables;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carts = Cart::leftjoin('users','users.id','carts.user_id')
                ->leftjoin('products','products.id','carts.prod_id')
                ->where('carts.status',Cart::PENDING)
                ->where('carts.user_id',auth()->user()->id)
                ->select('carts.*','products.prodname','products.price','products.image')
                ->get();
        // dd($carts);
        $subtotal = 0;
        foreach($carts as $cart){
            $subtotal  = $cart->price * $cart->qty + $subtotal;
        }
        $countries = DB::table('countries')->get(['name', 'id']);
        
        // dd($countries);
        return view('checkout.index', compact('carts', 'subtotal','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $user_id = Auth::user()->user_id;
        // dd($user_id); 
        $total_amount = (int) $request->price * (int) $request->qty;
        // $sub_total = $sub_total + $value['total_amount'];
        // dd($sub_total);
        $checkout = new Cart();
        $checkout->name = $request->name;
        $checkout->address = $request->address;
        $checkout->email = $request->email;
        $checkout->phone = $request->phone;
        $checkout->city = $request->city;
        $checkout->state = $request->state;
        $checkout->prodname = $request->prodname;
        $checkout->qty = $request->qty;
        $checkout->total_amount = $total_amount;
        $checkout->subtotal = $subtotal;
        // dd($request->total_qty);
        $checkout->save();

        $count = Cart::where('user_id', auth()->user()->id)->where('status',0)->count();
        return redirect()->route('checkout.store')->with('success', 'Your order has been placed');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
    
    public function getState(Request $request)
    {
        // dd($request);
        $carts = DB::select("SELECT products.prodname, carts.qty, carts.total_amount FROM products INNER JOIN users ON products.id = users.id INNER JOIN carts ON products.id = carts.prod_id");
        $subtotal = 0;
        foreach($carts as $cart){
            $subtotal  = $cart->total_amount * $cart->qty + $subtotal;
        }
        $countries = DB::table('countries')->get(['name', 'id']);
        $states = DB::table('states')
                        ->where("country_id", $request->country_id)
                        ->get(["name","id"]);
        // dd($states);
        // $html = view('checkout.index', compact('states','countries','carts', 'subtotal'))->render();
        // dd($html);
        return response()->json($states);
    }
    public function getCity(Request $request)
    {  
        $carts = DB::select("SELECT products.prodname, carts.qty, carts.total_amount FROM products INNER JOIN users ON products.id = users.id INNER JOIN carts ON products.id = carts.prod_id");
        $subtotal = 0;
        foreach($carts as $cart){
            $subtotal  = $cart->total_amount * $cart->qty + $subtotal;
        }
        $countries = DB::table('countries')->get(['name', 'id']);
        $cities = DB::table('cities')
                        ->where("state_id", $request->state_id)
                        ->get(["name","id"]);
        // $html = view('checkout.index', compact('cities','countries','carts', 'subtotal'))->render();
        return response()->json($cities);
    }
}
