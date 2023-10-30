<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use GuzzleHttp\Client;

class PaymentNotification extends Notification
{
    public function toMNotify($notifiable)
    {
        $message = 'Your payment has been received. Thank you!';
        $phone = $notifiable; // Replace with your notifiable model's phone field

        $client = new Client();

        // $response = $client->post('https://mnotify.com/api/smsapi/', [
        //     'form_params' => [
        //         'key' => 'bQWU97WiwiYX4awDiuESK4qzt',
        //         'to' => $phone,
        //         'msg' => $message,
        //         'sender_id' => 'Prvt-Hostel',
        //     ],
        // ]);
        // $response = $client->post('https://api.mnotify.com/api/sms/quick', [
        //     'form_params' => [
        //         'key' => 'bQWU97WiwiYX4awDiuESK4qzt',
        //         'sender' => 'Prvt-Hostel',
        //         'recipient' => $phone,
        //         'message' => $message,
        //         'is_schedule' => 'false',
        //         'schedule_date' => ''
        //     ],
        // ]);

        $endPoint = 'https://api.mnotify.com/api/sms/quick';
        // $apiKey = '4I7V9voJOgR2sWY7wg9gkjBtZ';
        $apiKey = 'WGq00aWm6vwnJkBoKixSNnjbr';
        $url = $endPoint . '?key=' . $apiKey;
        $data = [
            'sender' => 'Prvt-Hostel',
            'recipient' => [$phone],
            'message' => $message,
            'is_schedule' => 'false',
            'schedule_date' => ''
        ];

        $ch = curl_init();
        $headers = array();
        $headers[] = "Content-Type: application/json";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        $result = json_decode($result, TRUE);
        var_dump($result);
        curl_close($ch);

        return ['message' => 'successfuly sent!'];
    }
}
