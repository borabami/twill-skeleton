<!doctype html>
<html lang="en">

<head>
    {!! SEO::generate() !!}
    @include('partials.assets')
</head>

<body>

    <x-menu />

    <div class="overflow-y-auto">
        <div class="container max-w-screen-xl mx-auto px-4 pt-24 pb-16">
            <div class="prose md:prose-lg lg:prose-xl prose-a:font-normal mt-16 first:mt-0">
                @if($item->hasImage('cover'))
                <img src="{{ $item->image('cover') }}" alt="{{ $item->imageAltText('cover') }}" />
                @endif

                <h1>{{ $item->title }}</h1>
                <p>{{ $item->description }}</p>
            </div>

            {!! $item->renderBlocks() !!}
        </div>
    </div>

    <x-footer />
</body>
</html>