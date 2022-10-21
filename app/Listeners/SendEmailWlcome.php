<?php

namespace App\Listeners;

use App\Events\WelcomeUser;
use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailWlcome
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
     * @param  \App\Events\WelcomeUser  $event
     * @return void
     */
    public function handle(WelcomeUser $event)
    {
        // $user = User::find($event->user->id);
        // $user->update([
        //     'status' => 1,
        // ]);
        //Mail::to($event->user->email)->send(new TestMail($event->user));
    }
}