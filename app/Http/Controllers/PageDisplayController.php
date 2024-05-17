<?php

namespace App\Http\Controllers;

use A17\Twill\Facades\TwillAppSettings;
use App\Repositories\PageRepository;
use Illuminate\Contracts\View\View;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;
use Illuminate\Support\ItemNotFoundException;

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
    public function home()
    {
        try {
            if (TwillAppSettings::get('homepage.homepage.page')?->isNotEmpty()) {
                /** @var \App\Models\Page $frontPage */
                $frontPage = TwillAppSettings::get('homepage.homepage.page')->first();

                if ($frontPage->published) {
                    return view('site.page', ['item' => $frontPage]);
                }
            }
        } catch (ItemNotFoundException $exception) {

            abort(404);
        }
    }
}
