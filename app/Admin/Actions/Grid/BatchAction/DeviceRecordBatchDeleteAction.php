<?php

namespace App\Admin\Actions\Grid\BatchAction;

use App\Services\DeviceService;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\BatchAction;

class DeviceRecordBatchDeleteAction extends BatchAction
{
    public function __construct($title = null)
    {
        parent::__construct($title);
        $this->title = '🔨 ' . admin_trans_label('Batch Delete');
    }

    // 确认弹窗信息
    public function confirm(): string
    {
        return admin_trans_label('Batch Delete Confirm');
    }

    // 处理请求
    public function handle(): Response
    {
        if (!Admin::user()->can('device.batch.delete')) {
            return $this->response()
                ->error(trans('main.unauthorized'))
                ->refresh();
        }

        // 获取选中的ID
        $keys = $this->getKey();

        foreach ($keys as $key) {
            DeviceService::deviceDelete($key);
        }

        return $this->response()->success(trans('main.success'))->refresh();
    }
}
