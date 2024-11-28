@extends('layouts.mainlayout')
@push('links')
@include('layouts.links')
<link rel="stylesheet" href={{ asset('css/cart.css') }}>
@endpush
@push('scripts')
<script>
    document.querySelectorAll('.payment_option').forEach(option => {
    option.addEventListener('click', () => {
        if (option.classList.contains('selected')) {
            option.classList.remove('khalti-clicked', 'selected', 'option-clicked', 'bounce-animation');
            option.classList.add('bounce-animation');
            option.addEventListener("animationend", () => {
                option.classList.remove("bounce-animation"); 
            });
            return;
        }
        document.querySelectorAll('.payment_option').forEach(item => {
            item.classList.remove('khalti-clicked', 'selected', 'option-clicked', 'bounce-animation');
        });
        if (option.classList.contains('khalti')) {
            option.classList.add('khalti-clicked', 'selected');
        } else {
            option.classList.add('option-clicked', 'selected');
        }
        document.getElementById('selected_payment_method').value = option.getAttribute('data-method');
        option.classList.add('bounce-animation');
        option.addEventListener("animationend", () => {
            option.classList.remove("bounce-animation"); 
        });
    });
});


</script>
@endpush
@section('content')
@if (collect(session()->get('cart'))->sum('quantity') == 0)
<div class="no-items">
    <div>
        <h1 class="no-items-heading">No items added on cart</h1>
        <a href="{{ route('index') }}"><button class="return-btn">Continue Shopping <i
                    class="fa-solid fa-arrow-right"></i></button></a>
    </div>
</div>
@else

<div class="section-wrapper">
    <div>
        <h1 class="heading">Total Items : {{ collect(session()->get('cart'))->sum('quantity') ?? 0 }}</h1>
        <div class="cards-section">
            @php
            $total = 0;
            $shipment = 10;
            $tax = 10;
            $name = Auth::user()->username;
            $intName = (int) $name;
            $uuid = "order-" . $intName . "-" . rand(1000, 9999);
            $cart = session()->get('cart');
            $firstItem = reset($cart);
            $purchase_order_name = $firstItem['name'];
            @endphp
            @foreach ($cart as $id => $item)
            <div class="card">
                <img src=" {{ asset('storage/' . $item['image']) }} " alt="Cart Card Image">
                <div class="product-info">
                    <div class="name-price-wrapper">
                        <h3 class="product-heading">{{ $item['name'] }}</h3>
                        <p class="product-price">$ {{ $item['price'] }} </p>
                    </div>
                    <div class="product-description">{{ $item['description'] }}</div>
                    <div class="product-quantity">Quantity: {{ $item['quantity'] }} </div>
                    <div class="remove-product">
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            <button type="submit" class="remove-btn">Remove</button>
                        </form>
                    </div>
                </div>
            </div>
            @php
            $total += $item['price'] * $item['quantity'];
            @endphp
            @endforeach
        </div>
    </div>
    <div class="summary">
        <h1 class="heading">Summary</h1>
        <form class="summary-grid" action="{{ route('checkout') }}" method="POST">
            @csrf
            <p>Subtotal</p>
            <p>$ {{$total}}</p>
            <p>Estimated Shipping & Handling</p>
            <p>$ {{$shipment}}</p>
            <p>Estimated tax</p>
            <p>$ {{$tax}}</p>
            <p class="total-price">Total</p>
            <p class="total-price">$ {{$total+$shipment+$tax}}</p>
            <div class="payment-method">
                <p>Payment Method: </p>
                <div class="options">
                    <div class="esewa payment_option" data-method="esewa">E sewa</div>
                    <div class="khalti payment_option" data-method="khalti">Khalti</div>
                    <div class="cash payment_option" data-method="cash">Cash on Delivery</div>
                </div>
                <input type="hidden" id="selected_payment_method" name="payment_method" value="">
                <input type="hidden" name="amount" value="{{$total}}">
                <input type="hidden" name="tax_amount" value="{{$tax}}">
                <input type="hidden" name="delivery_charge" value="{{$shipment}}">
                <input type="hidden" name="total_amount" value="{{$total+$shipment+$tax}}">
                <input type="hidden" name="transaction_uuid" value="{{$uuid}}">

                <input type="hidden" name="purchase_order_name" value="{{$purchase_order_name}}">
                <input type="hidden" name="customer_name" value="{{Auth::user()->username}}">
                <input type="hidden" name="customer_email" value="{{Auth::user()->email}}">

            </div>
            <button class="checkout-btn" type="submit">Checkout</button>
        </form>
    </div>
</div>
@endif
@endsection