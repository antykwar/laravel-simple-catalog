@php
    /* @var \App\DataObjects\Product\ProductData $productData*/
@endphp

@extends('layouts.basic')

@section('title', 'Product card for ' . $productData->name)

@section('content')
    <h1>{{ $productData->name }}</h1>
    <div class="well">
        <h3>{{ $productData->price }}</h3>
        <h3>{{ $productData->description }}</h3>
        <hr/>
        <a
            href="{{ route('product-edit-form', ['productId' => $productData->id]) }}"
            class="btn btn-default"
        >Edit</a>
        <a
            href="{{ route('product-delete', ['productId' => $productData->id]) }}"
            class="btn btn-danger"
        >Delete</a>
    </div>
@stop
