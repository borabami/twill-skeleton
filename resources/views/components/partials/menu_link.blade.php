<div class="group">
    <p class="link-hover cursor-pointer md:pr-4 text-bas">{{$link->title}}</p>

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
                 <div class="flex items-center space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="15" width="15"><title>minus</title><path d="M19,13H5V11H19V13Z" /></svg> 
                <a href="{{ $url }}" aria-label="{{$children->title}}" class="flex flex-col text-base" @if($children->open_in_new_tab == true) target="_blank" @endif>
                    {{$children->title}}
                </a>
                 </div>
            @endif
        @endforeach
    </nav>
</div>



