<?php

namespace App\Notifications\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNotifiation extends Notification
{
    use Queueable;

    public $post, $liker;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post, User $liker)
    {
        $this->post = $post;
        $this->liker = $liker;
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

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'name' => $this->liker->name,
            'message' => ' likes your ',
            'notifier_user_id' => $this->liker->id,
            'post_id' => $this->post->id
        ];
    }
}
