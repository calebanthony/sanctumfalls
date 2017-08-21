<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Sanctum Falls</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('partials.ganalytics')
    <div class="container">
        @include('partials.navbar')
    </div>
    <section id="app" class="section">
        <div class="container">
            @yield('content')
        </div>
    </section>

    <script src="/js/tinymce/tinymce.min.js" defer></script>
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @include('partials.flash')
</body>
</html>
