<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Paystack\Facades\Paystack;
use App\Models\User;
use App\Models\Booking;
use App\Models\Payment;
use function numberToWords;
use App\Notifications\PaymentNotification;


class PaymentController extends Controller
{
    //

    public function redirectToGateway(Request $request)
    {
        $metadata = [
            'booking_id' => $request->booking_id,
            'user_id' => $request->user_id,
            // Add more key-value pairs as needed
        ];

        $payment = array(
            'amount' => $request->amount * 100, // Amount in kobo (e.g., ₦500.00 is 50000 kobo)
            'reference' => uniqid('REF'), // Generate a unique reference for the transaction
            'email' => $request->email, // Customer's email
            'metadata' => $metadata, // Include the metadata array
        );

        return Paystack::getAuthorizationUrl($payment)->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        // dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want

        $status = $paymentDetails['data']['status'];
        $channel = $paymentDetails['data']['channel'];

        if ($status == 'success') {
            $payment = new Payment();
            $payment->booking_id = $paymentDetails['data']['metadata']['booking_id'];
            $payment->user_id = $paymentDetails['data']['metadata']['user_id'];
            $payment->transaction_id = $paymentDetails['data']['reference'];
            $payment->amount = $paymentDetails['data']['amount'];
            $payment->payment_method = $channel;
            // Generate a unique invoice number
            $prefix = "INV-";
            $uniqueNumber = uniqid();

            $invoiceNumber = $prefix . $uniqueNumber;
            $payment->invoice_no = $invoiceNumber;
            $payment->save();

            $booking = Booking::find($paymentDetails['data']['metadata']['booking_id']);
            $booking->status = 'Confirmed';
            $booking->save();

            $user = User::find($paymentDetails['data']['metadata']['user_id']);
            $payNotif = new PaymentNotification();
            // $user->notify(
            //    );
            $payNotif->toMNotify($user->phone);


            return redirect()->route('booking.invoice', $booking->id)->withMessage(['msg' => 'Payment successful', 'type' => 'success']);
        } else {
            return redirect()->route('booking.step2', $booking->id)->withMessage(['msg' => 'Payment failed', 'type' => 'error']);
        }
    }


    public function invoice($id)
    {
        $booking = Booking::find($id);
        $user = User::find($booking->user_id);
        $payment = Payment::where('booking_id', $booking->id)->first();

        $amountInWords = ucwords(numberToWords($payment->amount));

        return view('booking.invoice', compact('booking', 'user', 'payment', 'amountInWords'));
    }
}
