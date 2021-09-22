<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendEmails;

class DispatchEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:weekly_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hello User, thanks for choosing our product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $SendEmail =  dispatch(new SendEmails());
    }
}
