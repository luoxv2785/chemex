<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Models\CheckRecord;
use App\Models\CheckTrack;
use App\Services\NotificationService;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;

class CheckRecordUpdateYesAction extends RowAction
{
    public function __construct($title = null)
    {
        parent::__construct($title);
        $this->title = '⚡ ' . admin_trans_label('Finish Record');
    }

    /**
     * 处理动作逻辑
     * @return Response
     */
    public function handle(): Response
    {
        if (!Admin::user()->can('check.record.update.yes')) {
            return $this->response()
                ->error('main.unauthorized')
                ->refresh();
        }

        $check_track = CheckTrack::where('status', 0)->where('check_id', $this->getKey())->first();
        if (empty($check_track)) {
            $check_record = CheckRecord::where('id', $this->getKey())->firstOrFail();
            if ($check_record->status == 1) {
                return $this->response()
                    ->warning(admin_trans_label('Finish Fail Done'));
            }
            if ($check_record->status == 2) {
                return $this->response()
                    ->warning(admin_trans_label('Finish Fail Cancelled'));
            }

            NotificationService::deleteNotificationWhenCheckFinishedOrCancelled($this->getKey());

            $check_record->status = 1;
            $check_record->save();

            return $this->response()
                ->success(admin_trans_label('Finished'))
                ->refresh();
        } else {
            return $this->response()
                ->error(admin_trans_label('Finish Fail Left') . $check_track->id);
        }
    }

    /**
     * 对话框
     * @return string[]
     */
    public function confirm(): array
    {
        return [admin_trans_label('Finish Confirm'), admin_trans_label('Finish Confirm Description')];
    }
}
