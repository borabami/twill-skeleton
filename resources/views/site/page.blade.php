<!doctype html>
<html lang="en">

<head>
    {!! SEO::generate() !!}
    @include('partials.assets')
</head>

<body>

    <x-menu />

    <div class="px-5 md:px-0">
        <div class="prose md:prose-lg lg:prose-xl prose-a:font-normal mt-16 first:mt-0 max-w-2xl mx-auto">
            @if($item->hasImage('cover'))
            <img src="{{ $item->image('cover') }}" alt="{{ $item->imageAltText('cover') }}" />
            @endif

            <h1>{{ $item->title }}</h1>
            <p>{{ $item->description }}</p>
        </div>

        {!! $item->renderBlocks() !!}
    </div>

    <x-footer />

</body>

</html>