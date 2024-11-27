<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index(Request $req){
        if ($req->payment_method == 'esewa'){
            $inputString = "total_amount=".$req->total_amount.",transaction_uuid=".$req->transaction_uuid.",product_code=EPAYTEST";
        $secretKey = "8gBm/:&EnhH.1/q";
        $hash = hash_hmac('sha256', $inputString, $secretKey, true);
        $signature = base64_encode($hash);

        $data = [
            'amount' => $req->amount,
            'tax_amount' => $req->tax_amount,
            'product_delivery_charge' => $req->delivery_charge,
            'total_amount' => $req->total_amount,
            'transaction_uuid' => $req->transaction_uuid,
            'product_service_charge' => 0,
            'product_code' => 'EPAYTEST',
            'success_url' => route('index'),
            'failure_url' => route('cart'),
            'signed_field_names' => 'total_amount,transaction_uuid,product_code',
            'signature' => $signature,
        ];
        return view('submit_payment', ['data' => $data]);
        }else {
            return redirect()->back();
        }
    }
}
