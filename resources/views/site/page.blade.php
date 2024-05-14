<!doctype html>
<html lang="en">

<head>
    {!! SEO::generate() !!}
    @include('partials.assets')
</head>

<body>

    <x-menu />

<<<<<<< HEAD
    <div class="overflow-y-auto">
        <div class="container max-w-screen-xl mx-auto px-4 pt-24 pb-16">
            <div>
                @if($item->hasImage('cover'))
                <img src="{{ $item->image('cover') }}" alt="{{ $item->imageAltText('cover') }}" />
                @endif
=======
    <div>
        <div class="prose md:prose-lg lg:prose-xl prose-a:font-normal mt-16 first:mt-0 max-w-2xl mx-auto px-5 md:px-0">
            @if($item->hasImage('cover'))
            <img src="{{ $item->image('cover') }}" alt="{{ $item->imageAltText('cover') }}" />
            @endif
>>>>>>> cd183ff8a5d5d6a71fccb31258d62532b7b08cc8

                <h1>{{ $item->title }}</h1>
                <p>{{ $item->description }}</p>
            </div>

            {!! $item->renderBlocks() !!}
        </div>
    </div>

    <x-footer />
</body>
</html>