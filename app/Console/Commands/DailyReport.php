<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DailyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:daily-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to mail a report showing daily statistics';

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
     * @return mixed
     */
    public function handle()
    {
        //
        Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
        {
            $message->to('willpiears@hotmail.co.uk');
        });
    }
}
