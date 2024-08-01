@extends("layouts.panel")
@push('links')
@include('layouts.links')
<link rel="stylesheet" href={{ asset('css/admin_panel.css') }}>
@endpush
@section('content')
<div class="orders_section">
    <div class="orders_table">
        <h2 class="table_heading"><span>Products</span> <button class="table-btn add-btn">Add <i class="fa-solid fa-plus"></i></button></h2>
        <div class="scrollabe-div">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>id</th>
                        <th>description</th>
                        <th colspan="3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product) 
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->id}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <a href="{{ route('product.view', $product->id) }}"><button class="table-btn view-btn" aria-label="View {{ $product->name }}">view</button></a>
                            </td>
                            <td>
                                <a href="{{ route('product.edit', $product->id) }}"><button class="table-btn edit-btn">edit</button></a>
                            </td>
                            <td>
                                <a href="{{ route('product.delete', $product->id) }}"><button class="table-btn delete-btn">delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection