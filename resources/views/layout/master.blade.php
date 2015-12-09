<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}" />

    <title></title>

    {!! HTML::style(elixir('css/lib.css')) !!}
        @yield('style')
    {!! HTML::style(elixir('css/app.css')) !!}
</head>

<body>
    @include('layout.navigation')

    <main class="container">
        @yield('main')
    </main>

    @include('layout.footer')

    {!! HTML::script(elixir('js/lib.js')) !!}
        @yield('script')
    {!! HTML::script(elixir('js/app.js')) !!}

</body>

</html>
