<?php

namespace App\Admin\Actions\Grid\BatchAction;

use App\Services\UserService;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Grid\BatchAction;

class UserBatchDeleteAction extends BatchAction
{
    public function __construct($title = null)
    {
        parent::__construct($title);
        $this->title = '🔨 ' . admin_trans_label('Batch Delete');
    }

    /**
     * 确认弹窗.
     *
     * @return string
     */
    public function confirm(): string
    {
        return admin_trans_label('Batch Delete Confirm');
    }

    /**
     * 处理逻辑.
     *
     * @return \Dcat\Admin\Actions\Response
     */
    public function handle(): Response
    {
        $keys = $this->getKey();

        foreach ($keys as $key) {
            UserService::userDelete($key);
        }

        return $this->response()->success(trans('main.success'))->refresh();
    }
}
