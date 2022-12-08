<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\ExpressCheckout;


class PayPalPaymentController extends Controller
{
    public function handlePayment($id)
    {
        $course = Course::findOrFail($id);
        $data = [];
        $data['items'] = [
            [
                'name' => $course->name,
                'price' => $course->price,
                'desc'  =>'Course fees are payed by PayPal',
                'qty' => 1
            ]
        ];
//        return redirect()->route('success.payment');
        $data['invoice_id'] = uniqid();
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('success.payment');
        $data['cancel_url'] = route('cancel.payment');
        $data['total'] = $data['items'][0]['price'];

        $paypalModule = new ExpressCheckout();
        $response = $paypalModule->setExpressCheckout($data);
        $response = $paypalModule->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
    }

    public function paymentCancel()
    {

        Session::flash('error', "Sorry! There may be an error. PayPal payment is failed......");
        return redirect()->route('home');
    }

    public function paymentSuccess(Request $request)
    {

        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
//            dd('Your payment was successfully. You can create success page here.');
            Session::flash('success', "Payment was successful.");

            return redirect()->route('home');
        }

        dd('Something is wrong.');


    }
}
