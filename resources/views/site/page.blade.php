<!doctype html>
<html lang="en">

<head>
    {!! SEO::generate() !!}
    @include('partials.assets')
</head>

<body>

    <x-menu />

    <div class="mx-auto max-w-2xl p-10 md:px-0 h-screen">
        <div class="prose md:prose-lg lg:prose-xl prose-a:font-normal mt-16 first:mt-0">
            @if($item->hasImage('cover'))
            <img src="{{ $item->image('cover') }}" alt="{{ $item->imageAltText('cover') }}" />
            @endif

            <h1>{{ $item->title }}</h1>
            <p>{{ $item->description }}</p>
        </div>

        {!! $item->renderBlocks() !!}
    </div>

    

</body>
<x-footer />
</html>