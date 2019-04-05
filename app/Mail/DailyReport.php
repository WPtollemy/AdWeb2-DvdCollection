<?php

namespace App\Mail;

use App\Dvd;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DailyReport extends Mailable
{
    use Queueable, SerializesModels;

    public $dailyDvds;
    public $dailyUsers;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dailyDvds = Dvd::whereDate('created_at', Carbon::today())->count();
        $this->dailyUsers = User::whereDate('created_at', Carbon::today())->count();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.daily-report');
    }
}
