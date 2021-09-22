<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Mail;

class SendEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::all();
        // dd($user->toArray());

        foreach ($users as $user) {
         $details=[
            // dd($user);
            'title' => 'Your order has been completed',
            'body' => 'email testing',
            'email' => 'dhruvshah@mailnator.com'
        ];

        Mail::send('emails.TestMail', ['details' => $details], function ($message) use ($details) {
            $message->to('dhruvshah@mailnator.com')
                    ->subject('Testing Mail');
            $message->from('dhruv1.elsner@gmail.com');
        });

        }
    }
}
