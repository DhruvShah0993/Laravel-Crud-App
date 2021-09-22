<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
// use Datatables;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = getOrderDetails();

        // return redirect()->route('order.index');
        // return view('order.show');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // dd('here');
        $orders = [];
        // dd($orders);
        if ($request->ajax()) {
            // dd($request);
            $data = Order::join('products', 'products.id', 'orders.prod_id')
                        ->join('users', 'users.id', 'orders.user_id')
                        ->select('orders.id', 'users.name', 'products.prodname', 'products.image', 'orders.price', 'orders.qty', 'orders.total', 'orders.address','orders.status')
                        ->get();
            // dd($data->toArray());
            return Datatables::of($data)
            // dd($data);
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    $btn = '<div class="form-group">
                    <select class="form-control order" name="order_id">
                        <option value="">Select Status</option>
                  
                        <option value="0_'. $row->id .'"'. ($row->status==0 ? ' selected' : '') . '>Pending</option>
                        <option value="1_'. $row->id .'"'. ($row->status==1 ? ' selected' : '') . '>Confirm</option>
                    </select>
                    </div>';
                    
                    return $btn;
                })
                ->rawColumns(['status'])
                ->make(true);
        }
        return view('order.show')->with('orders',$orders);
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate(Request $request)
    {
        //
        $updateOrder = Order::where('id', $request->id)
                    ->update(['status' => $request->status]);

        if($request->status == 0)
        {
            return response()->json(array('success' => true, 'message' => 'Order Pending'));
        }
        else
        {
            return response()->json(array('success' => true, 'message' => 'Order Confirmed'));
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
