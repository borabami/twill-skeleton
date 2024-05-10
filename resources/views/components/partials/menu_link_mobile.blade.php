<div class="group">
    <p class="cursor-pointer children-link flex items-center text-xl">{{$link->title}}
        
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="25" width="25" class="menu-down"><title>menu-down</title><path d="M7,10L12,15L17,10H7Z" /></svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  height="25" width="25" class="menu-up hidden"><title>menu-up</title><path d="M7,15L12,10L17,15H7Z" /></svg>
  </p>

    <nav class="hidden" id="menu-nav_{{$link->id}}">
        @foreach($link->children as $children)
            @if ($children->children->count() > 0)
                @include('components.partials.menu_link_mobile', ['link' => $children])
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
                    <a href="{{ $url }}" aria-label="{{$children->title}}" class="flex items-center text-xl" @if($children->open_in_new_tab == true) target="_blank" @endif>
                {{$children->title}}
                    </a>
               </div>
            @endif
        @endforeach
    </nav>
</div>