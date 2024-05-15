<footer class="bg-white shadow dark:bg-slate-100">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            @php
            $logo = strtok($image, '?');
            @endphp
            <a href="/home" aria-current="page" aria-label="home" class="footer-logo-holder w-nav-brand w--current"><img
                    src="{{ $logo }}" alt="logo" width="181" height="42" class="footer-logo"></a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
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
                    <li class="hover:underline me-4 md:me-6 capitalize">
                        <a href="{{ $url }}" aria-current="page" aria-label="{{ $link->title }}" @if($link->open_in_new_tab) target="_blank" @endif class="footer-link-block{{ url()->current() == $url ? ' w--current' : '' }}">
                            {{ $link->title }}
                        </a>
                    </li>
                    @endforeach
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ date('Y') }} <a href="https://flowbite.com/" class="hover:underline"></a>. All Rights Reserved.</span>
    </div>
</footer>

