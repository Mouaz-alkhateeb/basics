<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatePost extends Notification
{
    use Queueable;
    private $post_id;
    private $author;
    public function __construct($post_id, $author,$title)
    {
        $this->post_id = $post_id;
        $this->author = $author;
        $this->title = $title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'post_id' => $this->post_id,
            'author' => $this->author,
            'title' => $this->title,
        ];
    }
}