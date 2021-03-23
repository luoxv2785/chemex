<?php

namespace App\Admin\Actions\Grid\BatchAction;

use App\Services\DeviceService;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Grid\BatchAction;

class DeviceRecordBatchDeleteAction extends BatchAction
{
    public function __construct()
    {
        parent::__construct();
        $this->title = '🔨 ' . admin_trans_label('Batch Delete');
    }

    public function confirm(): string
    {
        return admin_trans_label('Batch Delete Confirm');
    }

    public function handle(): Response
    {
        $keys = $this->getKey();

        foreach ($keys as $key) {
            DeviceService::deviceDelete($key);
        }

        return $this->response()
            ->success(trans('main.success'))
            ->refresh();
    }
}
