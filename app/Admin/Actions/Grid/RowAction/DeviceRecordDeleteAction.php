<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Services\DeviceService;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;

class DeviceRecordDeleteAction extends RowAction
{
    public function __construct($title = null)
    {
        parent::__construct($title);
        $this->title = '🔨 ' . admin_trans_label('Delete');
    }

    /**
     * 处理动作逻辑
     * @return Response
     */
    public function handle(): Response
    {
        if (!Admin::user()->can('device.record.delete')) {
            return $this->response()
                ->error('main.unauthorized')
                ->refresh();
        }

        DeviceService::deviceDelete($this->getKey());

        return $this->response()
            ->success(admin_trans_label('Delete Success'))
            ->refresh();
    }

    /**
     * 对话框
     * @return string[]
     */
    public function confirm(): array
    {
        return [admin_trans_label('Delete Confirm'), admin_trans_label('Delete Confirm Description')];
    }
}
