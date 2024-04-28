<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChatMessageNotification extends Notification
{
    use Queueable;
    public $active_job_id;
    public $type;
    /**
     * Create a new notification instance.
     */
    public function __construct($active_job_id, $type)
    {
        $this->active_job_id = $active_job_id;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'data' => 'You have a new message from your active job!',
            'route' => $this->type == EMPLOYER ? route('web.employers.chat.index', $this->active_job_id) : route('web.freelancers.chat.index', $this->active_job_id),
        ];
    }
}
