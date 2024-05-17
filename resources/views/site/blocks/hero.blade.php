<div id="{{$block->input('id')}}" class="h-[700px] bg-cover bg-center backdrop-brightness-90" style="background-image: url('{{ $block->image('background-image', 'desktop') }}');">

   <div class="flex flex-col justify-center md:text-start text-center text-white mx-auto max-w-2xl px-5 md:px-0 h-full">
    <p class="text-sm">{{$block->translatedInput('subtitle')}}</p>
    <h1 data-w-id="2c9db91f-f074-2622-181b-bad695bdeb4e"
                class="text-5xl font-bold leading-tight mb-4">{{$block->translatedInput('title')}}</h1>
    <p class="text-lg mb-8">{!!$block->translatedInput('text') !!}</p>

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

