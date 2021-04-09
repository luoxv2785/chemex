<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Admin\Forms\DeviceRecordDeleteForm;
use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;

class DeviceRecordDeleteActionNew extends RowAction
{
    public function __construct()
    {
        parent::__construct();
        $this->title = '🔨 ' . admin_trans_label('Delete');
    }

    public function render()
    {
        // 实例化表单类并传递自定义参数
        $form = DeviceRecordDeleteForm::make()->payload([
            'id' => $this->getKey(),
        ]);

        return Modal::make()
            ->lg()
            ->title(admin_trans_label('Record Delete'))
            ->body($form)
            ->button($this->title);
    }
}
