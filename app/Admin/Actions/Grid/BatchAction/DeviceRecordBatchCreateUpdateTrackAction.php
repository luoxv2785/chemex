<?php

namespace App\Admin\Actions\Grid\BatchAction;

use App\Admin\Forms\DeviceRecordBatchCreateUpdateTrackForm;
use Dcat\Admin\Grid\BatchAction;
use Dcat\Admin\Widgets\Modal;

class DeviceRecordBatchCreateUpdateTrackAction extends BatchAction
{
    public function __construct()
    {
        parent::__construct();
        $this->title = '👨‍💼 ' . admin_trans_label('Batch Track Create Update');
    }

    /**
     * 渲染模态框.
     *
     * @return Modal|string
     */
    public function render(): string|Modal
    {
        // 实例化表单类并传递自定义参数
        $form = DeviceRecordBatchCreateUpdateTrackForm::make()->payload([
            'ids' => $this->getSelectedKeysScript()
        ]);

        return Modal::make()
            ->lg()
            ->title(admin_trans_label('Track Create Update'))
            ->body($form)
            ->button($this->title);
    }
}
