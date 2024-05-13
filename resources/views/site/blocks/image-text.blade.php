<div class="section mt-16 max-w-2xl mx-auto px-5 md:px-0">
    <div>
        {!! $block->translatedInput('text') !!}
    </div>
            
    <div class="py-8 mx-auto max-w-2xl flex items-center" id="{{$block->input('id')}}">
        @if($block->hasImage('highlight', 'desktop') !== false)
            <img src="{{ $block->image('highlight', 'desktop') }}" alt="image" width="100%" height="100%" />
        @endif
    </div>
</div>