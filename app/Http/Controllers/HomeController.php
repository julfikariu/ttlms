<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\PayPalFlow;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
       $courses = Course::all();
       return view('home',compact('courses'));
   }


   public function testCard(){
       return view('test-card');
   }


   public function testCardSave(Request $request){

       $card_info= array(
           'card_number'=>'NWMaKft7ei/jMth9h8MwIOXiKAjNdd3RWlbkh11UVcBxxZ6KQYM70AHnJkg+PshG',
           'card_name'=>'Sam Charles Barbee',
           'addr1'=>'106 Arbor Drive',
           'addr2'=>'',
           'city'=>'Columbia',
           'state'=>'Missouri',
           'zipcode'=>'65201'
       );

       $payflow = new PayPalFlow();
       $payflow->payflow('', '', 'PayPal', '');

       $data_array = array(
           'comment1' => 'Sale order',
           'firstname' => 'Himel',
           'lastname' => 'Ali',
           'street' => '1 Main St',
           'city' => 'San Jose',
           'state' => 'CA',
           'zip' => '95131',
           'country' => 'US', // iso codes
           'cvv' => $request->cvc, // for cvv validation response
           'clientip' =>  '216.70.112.183'
       );

       $result = $payflow->sale_transaction($request->card_number, '0128', 6, 'USD', $data_array);

       dd($result);

   }


}
