<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.Post.Created')
            ->with([
                'user' => $this->user->name,
                'post' => $this->post->title,
                'postAddress' => $this->post->slug
            ]);
    }
}
