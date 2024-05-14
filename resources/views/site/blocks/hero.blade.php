<div class="relative h-screen w-full mt-16" id="{{$block->input('id')}}">

    <img src="{{$block->image('background-image', 'desktop')}}" alt="Background Image" class="absolute brightness-50 inset-0 w-full h-full object-cover" />

    <div class="absolute inset-0 flex flex-col items-center justify-center max-w-2xl mx-auto px-5 md:px-0">
        <div class=" text-white">
            <p class="text-sm">{{$block->translatedInput('subtitle')}}</p>
            <h1 data-w-id="2c9db91f-f074-2622-181b-bad695bdeb4e"
                class="text-5xl font-bold leading-tight mb-4">{{$block->translatedInput('title')}}</h1>
            <p class="text-lg mb-8">{!!$block->translatedInput('text') !!}</p>
        </div>

        @if ($block->input('scroll') == 1)

            <div data-w-id="2c9db91f-f074-2622-181b-bad695bdeb53"
                style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
                class="hero-video-wrapper inner">
                <a href="{{ $block->translatedInput('scroll_id') }}" aria-label="scroll"
                    id="w-node-_2c9db91f-f074-2622-181b-bad695bdeb54-0955a90e"
                    class="video-button w-inline-block w--current">
                    <div class="play-icon">↓</div>
                </a>
            </div>

        @endif
    </div>
</div>