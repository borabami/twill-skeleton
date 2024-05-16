<nav class="bg-gray-50 w-full z-10 fixed shadow-lg">

    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        @php
        $logo = strtok($image, '?');
        @endphp
           <a href="/" aria-label="home" aria-current="page" class="brand w-nav-brand w--current" ><img src="{{ $logo }}"
            alt="logo" class="logo" width="181" height="42"></a>

        <!-- Mobile menu button -->
        <button
            class="mobile-menu-button inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-600 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">

            <svg class="w-5 h-5 burger-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-6 h-6 close-icon hidden">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="mobile-menu hidden lg:hidden w-full">

            <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50">

                @foreach($links as $link)
                @if ($link->children->count() > 0)
                @include('components.partials.menu_link_mobile', ['link' => $link])
                @else
                @php
                $button_type = $link->type;
                $url = $link->call_to_action_url;
                if($button_type == "internal"){
                $url = $link->getRelated('page')->first()!=null ? route('frontend.page',
                [$link->getRelated('page')->first()?->slug]) : '#';
                }

                @endphp
                <li class="lg:pr-4 text-base font-normal uppercase">
                    <a href="{{$url}}" @if($link->open_in_new_tab == true) target="_blank" @endif
                        class="block px-3 rounded text-gray-600">
                        {{$link->title}}
                    </a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>


        <div class="hidden w-full lg:block lg:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 lg:flex-row lg:space-x-8 rtl:space-x-reverse lg:mt-0 lg:border-0 lg:bg-gray-5">
                @foreach($links as $link)
                @if ($link->children->count() > 0)
                @include('components.partials.menu_link', ['link' => $link])
                @else
                @php
                $button_type = $link->type;
                $url = $link->call_to_action_url;
                if($button_type == "internal"){
                $url = $link->getRelated('page')->first()!=null ? route('frontend.page',
                [$link->getRelated('page')->first()?->slug]) : '#';
                }

                @endphp
                <li>
                    <a href="{{$url}}" @if($link->open_in_new_tab == true) target="_blank" @endif
                        class="block  text-gray-600 text-base font-normal uppercase lg:hover:text-blue-700">
                        {{$link->title}}
                    </a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>

