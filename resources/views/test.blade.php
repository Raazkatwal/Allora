@php
// $random = rand(10, 99);
$random = 'Bags-2';
// Input string (signed fields concatenated)
$inputString = "total_amount=120,transaction_uuid=".$random.",product_code=EPAYTEST";

// UAT Secret Key
$secretKey = "8gBm/:&EnhH.1/q";

// Generate HMAC with SHA256
$hash = hash_hmac('sha256', $inputString, $secretKey, true);

// Encode in Base64
$signature = base64_encode($hash);



@endphp
<body>
    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
    <input type="text" id="amount" name="amount" value="100" required>
    <input type="text" id="tax_amount" name="tax_amount" value ="20" required>
    <input type="text" id="total_amount" name="total_amount" value="120" required>
    <input type="text" id="transaction_uuid" name="transaction_uuid" value="{{$random}}" required>
    <input type="text" id="product_code" name="product_code" value ="EPAYTEST" required>
    <input type="text" id="product_service_charge" name="product_service_charge" value="0" required>
    <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
    <input type="text" id="success_url" name="success_url" value="{{ route('index') }}" required>
    <input type="text" id="failure_url" name="failure_url" value="{{ route('cart') }}" required>
    <input type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
    <input type="text" id="signature" name="signature" value="{{$signature}}" required>
    <input value="Submit" type="submit">
    </form>
   </body>
    