<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Mail\PostCreatedMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailPostCreated implements ShouldQueue
{

    use InteractsWithQueue;
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
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $users = User::all();

        foreach ($users as $user) {

            Mail::to($user->email)->send(new PostCreatedMail($user,$event->post));
        }
    }
}
