<?php

namespace App\Listeners;

use App\Events\Test;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ResetMail;
use Illuminate\Support\Facades\Mail;


class SendEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Test  $event
     * @return void
     */
    public function handle(Test $event)
    {
        Mail::to($event->user->email)->send(new ResetMail());

        echo "发送". $event->user->name . "邮件成功！";
    }
}
