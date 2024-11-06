@extends('layouts.mainlayout')
@push('links')
    <link rel="stylesheet" href= {{ asset('css/allproducts.css') }} >
@endpush
@section('content')
    @livewire('all-products')
@endsection
@push('scripts')
<script>
    const minInput = document.querySelector(".min-input");
const maxInput = document.querySelector(".max-input");
const minRange = document.querySelector("#min-range");
const maxRange = document.querySelector("#max-range");
const priceSlider = document.querySelector(".price-slider");

// Define a minimum gap between the two values
const priceGap = 10;

// Update slider position and inputs when number inputs are changed
minInput.addEventListener("input", () => {
    let minVal = parseInt(minInput.value);
    let maxVal = parseInt(maxInput.value);

    if (minVal + priceGap > maxVal) {
        minVal = maxVal - priceGap;
    }
    minRange.value = minVal;
    updateSlider(minVal, maxVal);
});

maxInput.addEventListener("input", () => {
    let minVal = parseInt(minInput.value);
    let maxVal = parseInt(maxInput.value);

    if (maxVal - priceGap < minVal) {
        maxVal = minVal + priceGap;
    }
    maxRange.value = maxVal;
    updateSlider(minVal, maxVal);
});

// Update inputs and slider when range sliders are changed
minRange.addEventListener("input", () => {
    let minVal = parseInt(minRange.value);
    let maxVal = parseInt(maxRange.value);

    if (minVal + priceGap > maxVal) {
        minVal = maxVal - priceGap;
    }
    minInput.value = minVal;
    updateSlider(minVal, maxVal);
});

maxRange.addEventListener("input", () => {
    let minVal = parseInt(minRange.value);
    let maxVal = parseInt(maxRange.value);

    if (maxVal - priceGap < minVal) {
        maxVal = minVal + priceGap;
    }
    maxInput.value = maxVal;
    updateSlider(minVal, maxVal);
});

// Function to update the slider fill area
function updateSlider(min, max) {
    priceSlider.style.left = (min / maxRange.max) * 100 + "%";
    priceSlider.style.right = 100 - (max / maxRange.max) * 100 + "%";
}

// Initialize slider position
updateSlider(parseInt(minRange.value), parseInt(maxRange.value));

</script>
@endpush