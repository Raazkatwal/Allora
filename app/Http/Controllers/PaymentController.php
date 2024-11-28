<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index(Request $req)
    {
        if ($req->payment_method == 'esewa') {
            $inputString = "total_amount=" . $req->total_amount . ",transaction_uuid=" . $req->transaction_uuid . ",product_code=EPAYTEST";
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
            return view('esewa_payment', ['data' => $data]);
        } elseif ($req->payment_method == 'khalti') {
            return view('khalti_payment', ['data' => $req->all()]);
        } else {
            return redirect()->back();
        }
    }
    public function handleKhaltiPayment(Request $req)
    {
        $requestData = $req->all();
        $data = $requestData['data'];
        $payload = [
            "return_url" => $requestData['return_url'],
            "website_url" => $requestData['success_url'],
            "amount" => (int) $requestData['total_amount'] * 100, // Multiply by 100
            "purchase_order_id" => $data['transaction_uuid'],
            "purchase_order_name" => $data['purchase_order_name'],
            "customer_info" => [
                "name" => $data['customer_name'],
                "email" => $data['customer_email'],
                "phone" => $requestData['phone']
            ],
            "amount_breakdown" => [
                [
                    "label" => "Marked Price",
                    "amount" => (int) $data['amount'] * 100
                ],
                [
                    "label" => "Tax",
                    "amount" => (int) $data['tax_amount'] * 100
                ],
                [
                    "label" => "Delivery Charge",
                    "amount" => (int) $data['delivery_charge'] * 100
                ]
            ],
            "merchant_username" => "Allora",
            "merchant_extra" => "Your Best Fashion Store"
        ];
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                'Authorization: key live_secret_key_68791341fdd94846a146f0457ff7b455',
                'Content-Type: application/json',
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        $responseArray = json_decode($response, true);
        return redirect($responseArray['payment_url']);
    }
}
