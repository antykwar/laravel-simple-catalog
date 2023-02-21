@php
    /* @var \App\DataObjects\Product\ProductData $productData*/
@endphp

@extends('layouts.basic')

@if ($productData->id)
    @section('title', 'Update ' . $productData->name . ' card')
@else
    @section('title', 'Create new product card')
@endif

@section('content')
    {!! Form::open(['route' => ['product-create'], 'class' => "form-horizontal"]) !!}
        @if ($productData->id)
            {!! Form::hidden('id', $productData->id) !!}
        @endif
        <div class="form-group">
            @if ($productData->id)
                <h1>{!! $productData->name !!} card</h1>
            @else
                <h1>New product</h1>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::input(
                'text',
                'name',
                value: $productData->name,
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
                value: $productData->price,
                options: ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Product price', 'required']
             ) !!}
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea(
                'description',
                value: $productData->description,
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
        @if ($productData->id)
            {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
        @else
            {!! Form::submit('Add product', ['class' => 'btn btn-primary']) !!}
        @endif
    {!! Form::close() !!}
@stop
