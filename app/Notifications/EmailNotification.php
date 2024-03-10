<?php

namespace App\Notifications;

use App\Channels\EmailChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification
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
        return EmailChannel::class;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): string
    {
        return 'Thank you for using our application!';
    }

}
