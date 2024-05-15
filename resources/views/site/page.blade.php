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
            <div class="max-w-2xl mx-auto mt-16 px-5 md:px-0">
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