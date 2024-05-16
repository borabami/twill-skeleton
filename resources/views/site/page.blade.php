<!doctype html>
<html lang="en">

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

</html>