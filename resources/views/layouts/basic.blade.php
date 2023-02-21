<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Welcome to my ecommerce project!')</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}">Ecommerce application</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="{{ Route::is('page-about') ? 'active' : '' }}">
                    <a href="{{ route('page-about') }}">About</a>
                </li>
                <li class="{{ Route::is('products-list') ? 'active' : '' }}">
                    <a href="{{ route('products-list') }}">Products</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('product-create-form') }}">New product</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        @include('layouts.basic-flash-messages')
        @yield('content')
    </div>
</body>
</html>
