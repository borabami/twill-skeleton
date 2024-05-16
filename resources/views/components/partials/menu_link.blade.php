<div class="group">
    <p class="link-hover cursor-pointer text-base lg:hover:text-blue-700 uppercase font-normal text-gray-600">{{$link->title}}</p>

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
                 
                <a href="{{ $url }}" aria-label="{{$children->title}}" class="flex flex-col text-base font-normal text-gray-600 lg:hover:text-blue-700 lg:p-0" @if($children->open_in_new_tab == true) target="_blank" @endif>
                    {{$children->title}}
                </a>
                 </div>
            @endif
        @endforeach
    </nav>
</div>



