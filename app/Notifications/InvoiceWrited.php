<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Write;

class InvoiceWrited extends Notification implements ShouldQueue
{
    use Queueable;

    public $write;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Write $write)
    {
        $this->write = $write;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        
        // 使用数据库通知频道
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user_name = $this->write->user->name;
        $write_title = $this->write->write_title->title;
        $content = $user_name . '提交了最新的'. $write_title .'的感想';

        return (new MailMessage)
                    ->line($content)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /** [toDatabase 数据库记录通知] */
    public function toDatabase($notifiable)
    {
        $travel = $this->write->travel;
        // 存入数据库里的数据
        return [
            'write_id' => $this->write->id,
            'write_content' => $this->write->content,
            'user_id' => $this->write->user->id,
            'user_name' => $this->write->user->name,
            'user_avatar' => $this->write->user->avatar,
            'travel_name' => $travel->travel_name,
            'travel_id' => $travel->id,
        ];
    }



}
