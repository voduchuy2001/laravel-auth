<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <title>Shoppers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('client.layouts.css')

</head>

<body>
    <div class="site-wrap">

        @include('client.layouts.topbar')

        @include('sweetalert::alert')

        @yield('content')

        @include('client.layouts.footer')
    </div>

    @include('client.layouts.js')

</body>

</html>
