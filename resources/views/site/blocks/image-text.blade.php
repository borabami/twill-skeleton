<div class="py-10 mx-auto max-w-2xl px-5 md:px-0" id="{{$block->input('id')}}">
    <div class="prose">
        {!! $block->translatedInput('text') !!}
    </div>
            
    <div class="py-8 mx-auto max-w-2xl flex items-center">
        @if($block->hasImage('highlight', 'desktop') !== false)
            <img src="{{ $block->image('highlight', 'desktop') }}" alt="image" width="100%" height="100%" />
        @endif
    </div>
</div>