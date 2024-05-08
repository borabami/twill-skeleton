<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Support\Facades\Artisan;
use A17\Twill\Services\Forms\BladePartial;
use Illuminate\Auth\Access\AuthorizationException;

class PageController extends BaseModuleController
{
    protected $moduleName = 'pages';

    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->setPermalinkBase('');
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Input::make()->name('description')->label('Description')->translatable()
        );

        $form->add(
            Medias::make()->name('cover')->label('Cover image')
        );
        
        $form->add(
            BlockEditor::make()
        );

        // copy the below to include metadata fieldset
        $form->addFieldset(
            \A17\Twill\Services\Forms\Fieldset::make()
                ->title(trans('twill-metadata::form.titles.fieldset'))
                ->id('metadata')
                ->fields([
                    \A17\Twill\Services\Forms\BladePartial::make()->view('twill-metadata::includes.metadata-fields')
                        ->withAdditionalParams([
                            'metadata_card_type_options' => config('metadata.card_type_options'),
                            'metadata_og_type_options' => config('metadata.opengraph_type_options'),
                        ]),
                ])
        );

        return $form;
    }
    /**
     * 
     */
    public function getSideFieldsets(TwillModelContract $model): Form
    {

        $form = Form::make([]);

        $form->add(
            BladePartial::make()->view('twill.cache.button')->withAdditionalParams(["url" => '/api/pages/' . $model->id . '/clear-cache']),
        );

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('description')->title('Description')
        );

        return $table;
    }

    /**
     * 
     */
    public function clearPageCache($page_id)
    {
        $page = \App\Models\Page::find($page_id);
      
        if (!is_null($page)) {

            foreach ($page->slugs as $slug) {

                ResponseCache::forget('/' . $slug->locale . '/' . $slug->slug);
                ResponseCache::forget('/' . $slug->slug);

                Artisan::call('page-cache:clear /' . $slug->locale . '/' . $slug->slug);
                Artisan::call('page-cache:clear /' . $slug->slug);
            }
        }

        return $this->respondWithSuccess(
            twillTrans('Cache cleared', ['modelTitle' => "success"])
        );
    }
}
