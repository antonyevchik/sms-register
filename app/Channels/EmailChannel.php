<?php

namespace App\Channels;

use App\Models\User;
use App\Services\InforuEmailService;
use Illuminate\Notifications\Notification;

class EmailChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toMail($notifiable);

        if (config('external-apis.inforu.service_enabled') && $message && strlen($message) > 0 && $notifiable instanceof User) {
            $smsService = new InforuEmailService();
            $smsService->sendMessage($notifiable->email, $message);
        }
    }
}
