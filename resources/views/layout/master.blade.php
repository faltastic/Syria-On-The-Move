<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}" />

    <title></title>

    {!! HTML::style(elixir('css/lib.css')) !!}
    {!! HTML::style(elixir('css/app.css')) !!}
</head>

<body>
    @include('layout.navigation')

    <main class="container">
        @yield('main')
    </main>

    {!! HTML::script(elixir('js/lib.js')) !!}
    {!! HTML::script(elixir('js/app.js')) !!}

    @yield('script')

</body>

</html>
