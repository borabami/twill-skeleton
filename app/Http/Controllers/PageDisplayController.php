<?php

namespace App\Http\Controllers;

use A17\Twill\Facades\TwillAppSettings;
use App\Repositories\PageRepository;
use Illuminate\Contracts\View\View;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;

class PageDisplayController extends Controller
{
    use SetsMetadata;

    /**
     * 
     */
    public function show(string $slug, PageRepository $pageRepository): View
    {
        $page = $pageRepository->forSlug($slug);

        if (!$page) {
            abort(404);
        }
        // Set the page metadata
        $this->setMetadata($page);

        return view('site.page', ['item' => $page]);
    }

    /**
     * 
     */
    public function home(): View
    {
        if (TwillAppSettings::get('homepage.homepage.page')?->isNotEmpty()) {
            /** @var \App\Models\Page $frontPage */
            $frontPage = TwillAppSettings::get('homepage.homepage.page')->first();

            if ($frontPage->published) {
                return view('site.page', ['item' => $frontPage]);
            }
        }

        abort(404);
    }
}
