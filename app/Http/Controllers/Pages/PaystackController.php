<?php

namespace App\Http\Controllers\Pages;

use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaystackController extends Controller
{
    public function __autoloadconstruct()
    {
        return $this->middleware(['auth', 'verified']);
    }

    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        // dd($paymentDetails);
        
        $transaction = new Transaction();
        $transaction->status                =$paymentDetails['data']['status'];
        $transaction->amount_paid           =$paymentDetails['data']['amount'];
        $transaction->trans_id              =$paymentDetails['data']['id'];
        $transaction->ref_id                =$paymentDetails['data']['reference'];
        $transaction->user_id               =$paymentDetails['data']['metadata']['user_id'];
        $transaction->booking_id           =$paymentDetails['data']['metadata']['booking_id'];
        $transaction->save();
        
        if($transaction->save())
        {
            $booking = Booking::where('id', $paymentDetails['data']['metadata']['booking_id'])->first();
            
            // $booking->update(['paymentStatus' => true]);
            // $booking->property->update(['isAvailable' => false]);

            $notification = array(
                'messege' => 'Transaction Successful',
                'alert-type' => 'success'
            );

            return redirect()->route('booking.index')->with($notification);
        }else
        {
            $notification = array(
                'messege' => 'Transaction not Successful',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }
    }
}
