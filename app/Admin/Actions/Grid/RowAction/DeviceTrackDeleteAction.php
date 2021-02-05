<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Models\DeviceTrack;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;

class DeviceTrackDeleteAction extends RowAction
{

    public function __construct($title = null)
    {
        parent::__construct($title);
        $this->title = '🔗 ' . admin_trans_label('Delete');
    }

    /**
     * 处理动作逻辑
     * @return Response
     */
    public function handle(): Response
    {
        if (!Admin::user()->can('device.track.delete')) {
            return $this->response()
                ->error(trans('main.unauthorized'))
                ->refresh();
        }

        $device_track = DeviceTrack::where('id', $this->getKey())->first();

        if (empty($device_track)) {
            return $this->response()
                ->error(admin_trans_label('Track None'));
        }

        $device_track->delete();

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
        return [admin_trans_label('Delete Confirm')];
    }
}
