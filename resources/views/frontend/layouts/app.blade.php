<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="Rokib" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />
    {!! app('captcha')->renderJs() !!}
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />
    <title>
       @yield('title')
      </title>
      @include('frontend.layouts.css')
</head>
<body>
    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')

    @include('frontend.layouts.js')
    {!! NoCaptcha::renderJs() !!}
</body>
</html>
