<?php

namespace App\Notifications;

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
                'key' => 'bQWU97WiwiYX4awDiuESK4qzt',
                'to' => $phone,
                'msg' => $message,
                'sender_id' => 'Prvt-Hostel',
            ],
        ]);

        return $response->getBody();
    }
}
