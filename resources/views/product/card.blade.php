@php
    /* @var \App\Models\Product $product*/
@endphp

@extends('layouts.basic')

@section('title', 'Product card for ' . $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <div class="container">
        @if(count($product->images) > 0)
            @include('product.images.view', ['product' => $product])
        @endif
        <div class="row well">
            <h3>{{ $product->price }}</h3>
            <h3>{{ $product->description }}</h3>
            <hr/>
            {!! Form::open(['route' => ['product-delete'], 'class' => "form-horizontal"]) !!}
            <a
                href="{{ route('product-edit-form', ['productId' => $product->id]) }}"
                class="btn btn-default"
            >Edit</a>
            {!! Form::input('hidden', 'productId', value: $product->id) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
