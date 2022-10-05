<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;

class StripePaymentController extends Controller
{

    public function index($course_id){
        if(!Auth::check()){
            Session::flash('error', 'Please login.');

            return redirect()->route('home');
        }
        $course = Course::findOrFail($course_id);
        return view('pages.payment-stripe',compact('course'));
    }


    public function confirmPayment(Request $request){
        $this->createStripeCharge($request);

        Session::flash('success', 'Payment completed successfully.');

        return redirect()->route('home');
    }

    private function createStripeCharge($request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $customer = Customer::create([
                'email' => auth()->user()->email,
                'source'  => $request->stripeToken
            ]);

            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => 100*round($request->amount),
                'currency' => "usd"
            ]);

        } catch (\Stripe\Error\Base $e) {
            return redirect()->back()->withError($e->getMessage())->send();
        }
    }




}
