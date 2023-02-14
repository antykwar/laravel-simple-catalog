@extends('layouts.basic')
@section('title', 'Product card for ' . $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <div class="well">
        <h3>{{ $product->price }}</h3>
        <h3>{{ $product->description }}</h3>
    </div>
@stop
