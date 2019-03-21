<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Chat;

class ChatOnLine extends Notification
{
    use Queueable;

    public $chat;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Chat $chat)
    {
        // 注入实例
        $this->chat = $chat;
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

    public function toDataBase($notifiable)
    {
        return [
            'chat_id' => $this->chat->id,
            'user_id' => $this->chat->user_id,
            'to_id' => $this->chat->to_id,
            'type' => $this->chat->type,
            'content' => $this->chat->content,
            'image' => $this->chat->image,
        ];
    }

    
}
