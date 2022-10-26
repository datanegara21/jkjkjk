<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Payment, Profile, Join, Event};
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function paymentSubmit(Request $request) {
        $profile = Profile::where('email', Auth::user()->email)->first();
        $event = Event::where('id', $request->event_id)->first();
        // return $request->all();
        $json = json_decode($request->json);

        if($json->transaction_status == 'deny' || $json->transaction_status == 'cancel' || $json->transaction_status == 'expire'){

        }else{
            $join = new Join();
            $join->profile_id = $profile->id;
            $join->event_id = $request->event_id;
            $join->order_id = $json->order_id;
            if($json->transaction_status == 'settlement' || $json->transaction_status == 'capture'){
                $join->paid = 1;
            }else{
                $join->paid = 0;
            }
            $join->save();
        }        

        $payment = new Payment();
        $payment->profile_id = $profile->id;
        $payment->event_id = $request->event_id;
        $payment->title = 'Daftar event "'.$event->title.'"';
        $payment->status = $json->transaction_status;
        $payment->transaction_id = $json->transaction_id;
        $payment->order_id = $json->order_id;
        $payment->gross_amount = $json->gross_amount;
        $payment->payment_type = $json->payment_type;
        $payment->payment_code = isset($json->payment_code) ? $json->payment_code : '';
        $payment->pdf_url = isset($json->pdf_url) ? $json->pdf_url : '';
        return $payment->save() ? redirect('/transaction')->withToastSuccess('Order berhasil dibuat') : redirect('/transaction')->withToastWarning('Terjadi kesalahan');
    }
    public function index_transaction() {
        $profile = Profile::where('email', Auth::user()->email)->first();
        $payments = Payment::where('profile_id', $profile->id)->orderBy('created_at', 'desc')->get();
        return view('user.transaction')->with(compact('payments'));
    }
    public function data_transaction() {
        // $profile = Profile::where('email', Auth::user()->email)->first();
        $payments = Payment::where('profile_id', 4)->orderBy('created_at', 'desc')->get();
        return response()->json([
            'data' => $payments
        ]);
    }
}
