<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use GuzzleHttp\Client;

class PaymentNotification extends Notification
{
    public function toMNotify($notifiable)
    {
        $message = 'Your payment has been received. Thank you!';
        $phone = $notifiable->phone; // Replace with your notifiable model's phone field

        $client = new Client();

        $response = $client->post('https://mnotify.com/api/smsapi', [
            'form_params' => [
                'key' => 'YOUR_API_KEY',
                'to' => $phone,
                'msg' => $message,
            ],
        ]);

        return $response->getBody();
    }
}
