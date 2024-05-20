<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {!! SEO::generate() !!}
    @include('partials.assets')
</head>

<body class="flex flex-col min-h-screen">

    <x-menu />

    <div class="overflow-y-auto">
        <div>
            {!! $item->renderBlocks() !!}
        </div>
    </div>

    <x-footer />
</body>

@include('partials.footer')

</html>