<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


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

        $provider = new PayPalClient([]);
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $order = $provider->createOrder([
                    "intent" => "CAPTURE",
                "purchase_units" => [
                    [
                        "amount"=>[
                            "currency_code" => "USD",
                            "value" => $course->price
                        ]
                    ]
                ],
            "application_context"=>[
                "cancel_url" => route('cancel.payment'),
                "return_url" =>route('success.payment')
            ]
        ]);


        if($order['status']=='CREATED'){
            $course_order = new Order();
            $course_order->user_id = auth()->user()->id;
            $course_order->course_id = $course->id;
            $course_order->payment_id = $order['id'];
            $course_order->amount = $course->price;
            $course_order->status = 'Pending';

            $course_order->save();

            return redirect($order['links'][1]['href']);
        }

        Session::flash('error', "Sorry! There may be an error. PayPal payment is failed.");
        return redirect()->route('home');
    }

    public function paymentCancel()
    {

        Session::flash('error', "Sorry! There may be an error. PayPal payment is failed......");
        return redirect()->route('home');
    }

    public function paymentSuccess(Request $request)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request['token']);


        if(isset($response['status']) && $response['status']=='COMPLETED'){

            $course_order = Order::where('payment_id',$response['id'])->first();
            $course_order->status = 'Paid';
            $course_order->save();

            Session::flash('success', "Course purchase successfully.");
            return redirect()->route('home');
        }

        Session::flash('error', "Sorry! There may be an error. PayPal payment is failed......");
        return redirect()->route('home');

    }
}
