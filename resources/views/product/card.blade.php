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
        {!! Form::open(['route' => ['product-delete'], 'class' => "form-horizontal"]) !!}
            <a
                href="{{ route('product-edit-form', ['productId' => $productData->id]) }}"
                class="btn btn-default"
            >Edit</a>
            {!! Form::input('hidden', 'productId', value: $productData->id) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@stop
