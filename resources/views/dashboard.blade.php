@extends("layouts.panel")
@push('links')
@include('layouts.links')
<link rel="stylesheet" href={{ asset('css/admin_panel.css') }}>
@section('content')
        @livewire('products-table')
@endsection