<div class="flex flex-col items-center justify-center mt-32">
    <div class="flex flex-col">
        <!-- Navbar -->
        <nav class="flex justify-around py-4 bg-white/80 backdrop-blur-md shadow-md w-full fixed top-0 left-0 right-0 z-10">
            <!-- Logo Container -->
            <div class="flex items-center">
                <!-- Logo -->
                <a class="cursor-pointer">
                    <h3 class="text-2xl font-medium">
                        @php
                        $logo = strtok($image, '?');
                        @endphp
                        <a href="/"><img src="{{ $logo }}" alt="logo" class="logo" width="181" height="42"></a>
                    </h3>
                </a>
            </div>

            <!-- Mobile menu button -->
            <button class="mobile-menu-button lg:hidden">
         
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 burger-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 close-icon hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="mobile-menu hidden absolute  bg-white shadow-md z-20">
                <ul class="px-5 md:flex md:flex-row md:flex-nowrap md:justify-center md:px-0">
                    @foreach($links as $link)
                    @if ($link->children->count() > 0)
                    @include('components.partials.menu_link', ['link' => $link])
                    @else
                    <li class="py-5 border-t border-t-secondary first:border-t-0 md:py-0 md:px-5 md:border-t-0 md:border-l md:border-l-secondary md:first:border-l-0">
                        <a href="{{route('frontend.page', [$link->getRelated('page')?->first()?->slug])}}">
                            {{$link->title}}
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            <!-- Links Section -->
            <div class="hidden mobile-menu items-center space-x-8 lg:flex">
                <ul class="px-5 md:flex md:flex-row md:flex-nowrap md:justify-center md:px-0">
                    @foreach($links as $link)
                    @if ($link->children->count() > 0)
                    @include('components.partials.menu_link', ['link' => $link])
                    @else
                    <li class="py-5 border-t border-t-secondary first:border-t-0 md:py-0 md:px-5 md:border-t-0 md:border-l md:border-l-secondary md:first:border-l-0">
                        <a href="{{route('frontend.page', [$link->getRelated('page')?->first()?->slug])}}">
                            {{$link->title}}
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</div>
