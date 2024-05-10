<div class="group">
    <p class="link-hover cursor-pointer">{{$link->title}}</p>

    <nav class="absolute w-52 p-4 shadow-lg bg-white hidden group-hover:block">
        @foreach($link->children as $children)
            @if ($children->children->count() > 0)
                @include('components.partials.menu_link', ['link' => $children])
            @else
                @php
                $button_type = $children->type;
                $url = $children->call_to_action_url;
                if ($button_type == "internal") {
                    $url = $children->getRelated('page')->first() != null ? route('frontend.page', [$children->getRelated('page')->first()?->slug]) : '#';
                }
                @endphp

                <a href="{{ $url }}" aria-label="{{$children->title}}" @if($children->open_in_new_tab == true) target="_blank" @endif>
                    {{$children->title}}
                </a>
            @endif
        @endforeach
    </nav>
</div>
