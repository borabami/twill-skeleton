<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Models\Model;

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
    }

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
                ->field('form_data')
                ->title(twillTrans('Form data'))
                ->customRender(function (Model $model) {
                    $formDataString = '';
                    foreach ($model->form_data as $key => $value) {
                        $formDataString .= '<strong>' . ucwords(str_replace('-', ' ', $key)) . ':</strong> ' . $value . '<br>';
                    }
                    return $formDataString;
                })
        );


        return $columns;
    }


    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    // protected function additionalIndexTableColumns(): TableColumns
    // {
    //     $table = parent::additionalIndexTableColumns();

    //     $table->add(
    //         Text::make()->field('description')->title('Description')
    //     );

    //     return $table;
    // }
}
