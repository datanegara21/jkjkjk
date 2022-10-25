<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Payment, Join};

class ApiController extends Controller
{
    public function payment_handler(Request $request){
        $json = json_decode($request->getContent());
        $hash = hash('sha512', $json->order_id.$json->status_code.$json->gross_amount.env('MIDTRANS_SERVER_KEY'));

        if($json->signature_key != $hash){
            return 'data not valid';
        }

        $join = Join::where('order_id', $json->order_id)->first();
        if($json->transaction_status == 'deny' || $json->transaction_status == 'cancel' || $json->transaction_status == 'expire'){
            $join->delete();
        }else{
            if($json->transaction_status == 'settlement' || $json->transaction_status == 'capture'){
                $join->update(['paid' => 1]);
            }else{
                $join->update(['paid' => 0]);
            }
        }

        $payment = Payment::where('order_id', $json->order_id)->first();
        // return $payment;
        return $payment->update(['status' => $json->transaction_status]);
    }
}
