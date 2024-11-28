<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout | Khalti</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .content-wrapper {
            display: grid;
            place-items: center;
            width: 100%;
            height: 100vh;
        }

        .content-wrapper form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        input[type=number] {
            -moz-appearance: textfield;
            -webkit-appearance: textfield;
            appearance: none;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            border: .15rem solid #4F286F;
            outline: none;
            border-radius: .5rem;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .submit{
            font-size: 1.5rem;
            padding: 1rem;
            background-color: #4F286F;
            color: white;
            border: none;
            outline: none;
            border-radius: .5rem;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <form action="{{ route('submit_khalti_payment', ['data'=>$data]) }}" method="POST">
            @csrf
            <img src="{{ asset('img/khalti.png') }}" alt="Logo">
            <input type="number" placeholder="Enter your Phone number" name="phone" required autocomplete="off">
            <input type="hidden" name="amount" value="{{ $data['amount'] }}">
            <input type="hidden" name="tax_amount" value="{{ $data['tax_amount'] }}">
            <input type="hidden" name="transaction_uuid" value="{{ $data['transaction_uuid'] }}">
            <input type="hidden" name="total_amount" value="{{ $data['total_amount'] }}">
            <input type="hidden" name="return_url" value="{{ route('index') }}">
            <input type="hidden" name="success_url" value="{{ route('index') }}">
            <button type="submit" class="submit">Pay with Khalti</button>
        </form>
    </div>
</body>

</html>