<?php

namespace App\Helper;

use App\Models\Order;
use App\Models\Product;
use Auth;

class OrderDetails {

    public static function getOrderDetails($product, $request) {
        try {
            $user_id = Auth::user()->id;
            $total = (int) $product->qty * (int) $product->price;
            
            $order = new Order();
            $order->id = $product->id;
            $order->user_id = $user_id;
            $order->prod_id = $product->prod_id;
            $order->address = $request->address;
            $order->contact = $request->contact;
            $order->city_id = $request->city;
            $order->price = $product->price;
            $order->qty = $product->qty;
            $order->total = $total;
            $order->status = 0;
            $order->save();
        } 
        catch (Exception $e) {
            Exceptions::exception($e);
        }
    }

}