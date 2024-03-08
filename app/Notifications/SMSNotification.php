<?php

namespace App\Notifications;

use App\Channels\SMSChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class SMSNotification extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param object $notifiable
     * @return string
     */
    public function via(object $notifiable): string
    {
        return SMSChannel::class;
    }

    /**
     * Get the SMS representation of the notification.
     */
    public function toSMS(object $notifiable): string
    {
        return 'Thank you for using our application!';
    }
}
