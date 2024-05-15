<nav class="bg-white border-gray-200 dark:bg-gray-900 w-full fixed">

    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        @php
        $logo = strtok($image, '?');
        @endphp

        <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a>

        <!-- Mobile menu button -->
        <button
            class="mobile-menu-button inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">

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

            <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">

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
                <li class="lg:pr-4 text-xl">
                    <a href="{{$url}}" @if($link->open_in_new_tab == true) target="_blank" @endif
                        class="block py-2 px-3 text-white rounded">
                        {{$link->title}}
                    </a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>


        <div class="hidden w-full lg:block lg:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 lg:flex-row lg:space-x-8 rtl:space-x-reverse lg:mt-0 lg:border-0 lg:bg-white dark:bg-gray-800 lg:dark:bg-gray-900 dark:border-gray-700">
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
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">
                        {{$link->title}}
                    </a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>