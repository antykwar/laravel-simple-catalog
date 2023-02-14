@extends('layouts.basic')
@section('title', 'Products page')

@section('content')
    <h1>Welcome to the Products page</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        <a href="{{ route('product-card', ['productId' => $product->id]) }}" target="_blank">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@stop
