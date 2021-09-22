<?php

namespace App\Observers;

use App\Models\Order;
use Auth;
use Mail;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        // dd($order);
        $order = Order::leftjoin('users', 'users.id', 'orders.user_id')
                    ->select('orders.*','users.email')
                    ->where('orders.id',$order->id)
                    ->first();
        // dd($order);
        // $name = Auth::user()->name;
        // $email = Auth::user()->email;
        $details=[

            'title' => 'Your order has been Placed',
            'body' => 'DS Shop Test mail',
            'email'=> $order->email
        ];
        
        // $details = array('name' => Auth::user()->name, 'body' => "A testing mail", 'email' => Auth::user()->email); 

        $mail = Mail::send('emails.mail', ['details' => $details], function($message) use ($details) {
            $message->to($details['email']) 
                    ->subject('DS Shop Test Mail');
            $message->from('dhruv1.elsner@gmail.com', 'DS Shop');
        });
        
        // return view('order.show', compact('orders'))->with('success', 'Email sent');
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        // dd($order);
        $order = Order::leftjoin('users', 'users.id', 'orders.user_id')
        ->select('orders.*','users.email')
        ->where('orders.id',$order->id)
        ->first();
        // dd($order);
        // $name = Auth::user()->name;
        // $email = Auth::user()->email;
                $details=[

                'title' => 'Your order has been Placed',
                'body' => 'DS Shop Test mail',
                'email'=> $order->email
                ];

                // $details = array('name' => Auth::user()->name, 'body' => "A testing mail", 'email' => Auth::user()->email); 

                $mail = Mail::send('emails.TestMail', ['details' => $details], function($message) use ($details) {
                $message->to($details['email']) 
                        ->subject('DS Shop Test Mail');
                $message->from('dhruv1.elsner@gmail.com', 'DS Shop');
                });

// return view('order.show', compact('orders'))->with('success', 'Email sent');

    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
