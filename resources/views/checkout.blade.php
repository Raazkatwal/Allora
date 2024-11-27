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
        option.classList.add('bounce-animation');
        option.addEventListener("animationend", () => {
            option.classList.remove("bounce-animation"); 
        });
    });
});


</script>
@endpush
@section('content')
<div class="section-wrapper">
    <div>
        <h1 class="heading">Total Items : {{ collect(session()->get('cart'))->sum('quantity') ?? 0 }}</h1>
        <div class="cards-section">
            @php
            $total = 0;
            $shipment = 10;
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
        <div class="summary-grid">
            <p>Subtotal</p>
            <p>$ {{$total}}</p>
            <p>Estimated Shipping & Handling</p>
            <p>$ {{$shipment}}</p>
            <p>Estimated tax</p>
            <p>-</p>
            <p class="total-price">Total</p>
            <p class="total-price">$ {{$total+$shipment}}</p>
            <div class="payment-method">
                <p>Payment Method: </p>
                <div class="options">
                    <div class="esewa payment_option">esewa</div>
                    <div class="khalti payment_option">khalti</div>
                    <div class="cash payment_option">cash on delivery</div>
                </div>
            </div>
            <button class="checkout-btn">Checkout</button>
        </div>
    </div>
</div>
@endsection