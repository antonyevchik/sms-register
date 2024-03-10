<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Log;

class InforuEmailService
{
    protected function generateBody($email, $message): array
    {
        return [
            'Data' => [
                'CampaignName' => $message->title,
                'FromAddress' => config('external-apis.inforu.from_address'),
                'Subject' => $message->subject,
                'Body' => htmlspecialchars($message->text),
                'IncludeContacts' => [
                    [
                        'Email' => $email
                    ]
                ]
            ]
        ];
    }

    public function sendMessage($email, $message)
    {
        $url = config('external-apis.inforu.email_endpoint');

        $request = Http::asJson()->withBasicAuth(
            config('external-apis.inforu.login'),
            config('external-apis.inforu.api_token')
        )
            ->post($url, $this->generateBody($email, $message));

        if ($request->failed()) {
            Log::error($request->body());
        }
    }
}
