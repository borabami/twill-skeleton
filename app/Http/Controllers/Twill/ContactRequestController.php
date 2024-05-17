<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Models\Model;
use A17\Twill\Services\Listings\Columns\Relation;
use Carbon\Carbon;

class ContactRequestController extends BaseModuleController
{
    protected $moduleName = 'contactRequests';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();
        $this->disableCreate();
        $this->disableEdit();
        $this->disablePublish();
        $this->disableBulkPublish();
        $this->disableEditor();
        $this->disableBulkEdit();

        $this->setSearchColumns(['to', 'subject', 'form_data']);
    }

    /**
     * 
     */
    protected function getIndexTableColumns(): TableColumns
    {
        $columns = new TableColumns();

        $columns->add(
            Text::make()
                ->field('to')
                ->title(twillTrans('To'))
        );
        $columns->add(
            Text::make()
                ->field('subject')
                ->title(twillTrans('Subject'))
        );

        $columns->add(
            Text::make()
                ->field('form_data')
                ->renderHtml(true)
                ->title(twillTrans('Form data'))
                ->customRender(function (Model $model) {
                    $formDataString = '';
                    foreach ($model->form_data as $key => $value) {
                        $formDataString .= '<strong>' . ucwords(str_replace('-', ' ', $key)) . ':</strong> ' . $value . '<br>';
                    }
                    return $formDataString;
                })
        );

        $columns->add(
            Relation::make()
                ->relation('blockable')
                ->field('title')
                ->title(twillTrans('Page'))
                ->linkCell(function (Model $model) {
                    return '/admin/pages/' . $model->blockable->id . '/edit';
                })
        );

        $columns->add(
            Text::make()
                ->sortable()
                ->field('created_at')
                ->title(twillTrans('Created'))
                ->customRender(function (Model $model) {
                    return Carbon::parse($model->created_at)->format('d/m/y H:i:s');
                })
        );

        return $columns;
    }
}
