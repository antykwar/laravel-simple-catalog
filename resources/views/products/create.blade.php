@extends('layouts.basic')
@section('title', 'Create new product card')

@section('content')
    {!! Form::open(['route' => ['product-create'], 'class' => "form-horizontal"]) !!}
        <div class="form-group">
            <h1>New product</h1>
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::input(
                'text',
                'name',
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
                options: ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Product price', 'required']
             ) !!}
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', options: [
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
        {!! Form::submit('Add product', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop
