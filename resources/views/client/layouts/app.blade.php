<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('client.layouts.css')

</head>

<body>

    <div class="site-wrap">
        @include('client.layouts.topbar')

        @yield('content')

        @include('client.layouts.footer')
    </div>

    @include('client.layouts.js')

</body>

</html>