<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>#madewithtwill website</title>
    @include('partials.assets')
</head>

<body>
    <div>
        @yield('content')
    </div>

</body>

</html>