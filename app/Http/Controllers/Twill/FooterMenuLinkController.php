<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;
use A17\Twill\Services\Forms\Fields\Browser;
use App\Models\Page;
use A17\Twill\Services\Forms\Fields\Checkbox;
use A17\Twill\Services\Forms\Fields\Select;
use A17\Twill\Services\Forms\Fieldset;
use A17\Twill\Services\Forms\Option;
use A17\Twill\Services\Forms\Options;
class FooterMenuLinkController extends BaseModuleController
{
    protected $moduleName = 'footerMenuLinks';
    protected $showOnlyParentItemsInBrowsers = true;
    protected $nestedItemsDepth = 1;
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();
        $this->enableReorder();
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->addFieldset(

            Fieldset::make()->title('Menu link')->id('call_to_action')->fields([

                Select::make()
                    ->name('type')
                    ->label(twillTrans('Link type'))
                    ->default("custom")
                    ->options(Options::make([
                        Option::make('internal', 'Internal'),
                        Option::make('custom', 'Custom'),

                    ])),

                Browser::make()
                    ->name('page')
                    ->modules([Page::class])
                    ->connectedTo('type', 'internal'),

                Input::make()
                    ->name('call_to_action_url')
                    ->type('text')
                    ->label(twillTrans('Link URL'))
                    ->connectedTo('type', 'custom'),


                Checkbox::make()
                    ->name('open_in_new_tab')
                    ->label(twillTrans("Open in new tab"))

            ]),

        );

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        return $table;
    }
}
