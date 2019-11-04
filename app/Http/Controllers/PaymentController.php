<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application as Application;

use Shipu\Aamarpay\Aamarpay;
use Session;

class PaymentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function paymentSuccessOrFailed(Request $request)
    {
        $registration_id = $request->get('opt_a');
        if($request->get('pay_status') == 'Failed') {
            Session::flash('info',$registration_id.': You need to make the payment!');
            return redirect(Route('application.payorcheck', $registration_id));
        }
        
        $amount_request = $request->get('opt_b');
        $amount_paid = $request->get('amount');
        
        if($amount_paid == $amount_request) {
          $registration = Application::where('registration_id', $registration_id)->first();
          $registration->trxid = $request->get('pg_txnid');
          $registration->payment_status = 1;
          $registration->card_type = $request->get('card_type');
          $registration->save();
          Session::flash('success','Registration is complete!');
        } else {
           // Something went wrong.
          Session::flash('info', $registration_id.': Something went wrong, please reload this page!');
          return redirect(Route('application.payorcheck', $registration_id));
        }
        
        //return $request->all();
        return redirect(Route('application.payorcheck', $registration_id));
    }
}
