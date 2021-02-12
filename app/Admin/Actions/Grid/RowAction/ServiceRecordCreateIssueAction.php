<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Admin\Forms\ServiceIssueCreateForm;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;

class ServiceRecordCreateIssueAction extends RowAction
{

    public function __construct($title = null)
    {
        parent::__construct($title);
        $this->title = '📢 ' . admin_trans_label('Issue Create');
    }

    /**
     * 渲染模态框
     * @return Modal|string
     */
    public function render()
    {
        if (!Admin::user()->can('service.issue.create')) {
            return trans('main.unauthorized');
        }

        $form = ServiceIssueCreateForm::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title(admin_trans_label('Issue Create'))
            ->body($form)
            ->button($this->title);
    }
}
