<footer class="bg-gray-50">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            @php
            $logo = strtok($image, '?'); 
            @endphp
              @if($hasImage == true)
             <a href="/" aria-label="home" aria-current="page" class="brand w-nav-brand w--current">
                     <img src="{{$logo}}" alt="logo" class="logo" width="181" height="42">
                 </a>
             @else
                <a href="/" aria-label="home" aria-current="page" class="brand w-nav-brand w--current">
                    {{ config('app.name') }}
                </a>
             @endif
            <ul class="flex flex-wrap items-center my-6 text-sm font-medium text-black sm:mb-0 ">
                <li>
                    @foreach($links as $link)
                    @php
                    $button_type = $link->type;
                    $url = $link->call_to_action_url;
                    if($button_type == "internal"){
                    $url = $link->getRelated('page')->first()!=null ? route('frontend.page',
                    [$link->getRelated('page')->first()?->slug]) : '#';
                    }  
                    $currentPageUrl = request()->fullUrl();
                    @endphp
                    <li class="me-4 md:me-6 uppercase">
                        <a href="{{ $url }}" aria-current="page" aria-label="{{ $link->title }}" @if($link->open_in_new_tab) target="_blank" @endif class="text-gray-600 hover:text-blue-700 footer-link-block{{ url()->current() == $url ? ' w--current' : '' }}">
                            {{ $link->title }}
                        </a>
                    </li>
                    @endforeach
                </li>
            </ul>
        </div>
        <hr class="my-8 border-gray-200 lg:my-12" />
        <span class="block text-sm font-semibold text-gray-600 text-center">© {{ date('Y') }} {{ config('app.name') }}. <a href="https://flowbite.com/" class="hover:underline"></a>All Rights Reserved.</span>
    </div>
</footer>

