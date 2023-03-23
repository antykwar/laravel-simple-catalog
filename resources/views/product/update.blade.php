@php
    /* @var \App\Models\Product $product*/
@endphp

@extends('layouts.basic')

@if ($product->id)
    @section('title', 'Update ' . $product->name . ' card')
@else
    @section('title', 'Create new product card')
@endif

@section('content')
    {!! Form::open(['route' => ['product-create'], 'class' => "form-horizontal", 'enctype' => 'multipart/form-data']) !!}
        @if ($product->id)
            {!! Form::hidden('id', $product->id) !!}
        @endif
        <div class="form-group">
            @if ($product->id)
                <h1>{!! $product->name !!} card</h1>
            @else
                <h1>New product</h1>
            @endif
            @if(count($product->images) > 0)
                <div class="container">
                    @include('product.images.edit', ['product' => $product])
                </div>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::input(
                'text',
                'name',
                value: $product->name,
                options: ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Product name', 'required']) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('price', 'Price') !!}
            {!! Form::input(
                'text',
                'price',
                value: $product->price,
                options: ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Product price', 'required']
             ) !!}
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('image', 'Product image') !!}
            {!! Form::file('image') !!}
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea(
                'description',
                value: $product->description,
                options: [
                'id' => 'description',
                'cols' => 30,
                'rows' => 10,
                'class' => 'form-control',
                'required',
            ]) !!}
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        @if ($product->id)
            {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
        @else
            {!! Form::submit('Add product', ['class' => 'btn btn-primary']) !!}
        @endif
    {!! Form::close() !!}
@stop
