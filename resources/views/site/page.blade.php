<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {!! SEO::generate() !!}
    @include('partials.assets')
</head>

<body>

    <x-menu />

    <div class="overflow-y-auto">
        <div class="py-16">
            {!! $item->renderBlocks() !!}
        </div>
    </div>

    <x-footer />
</body>

@include('partials.footer')

</html>