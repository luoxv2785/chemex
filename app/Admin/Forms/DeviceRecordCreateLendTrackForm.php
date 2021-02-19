<?php

namespace App\Admin\Forms;

use App\Models\DeviceRecord;
use App\Models\LendTrack;
use App\Models\PartRecord;
use App\Models\User;
use Dcat\Admin\Admin;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;


class DeviceRecordCreateLendTrackForm extends Form
{
    use LazyWidget;

    /**
     * 处理表单提交逻辑
     * @param array $input
     * @return JsonResponse
     */
    public function handle(array $input): JsonResponse
    {
        if (!Admin::user()->can('lend.tracks.create_update')) {
            return $this->response()
                ->error(trans('main.unauthorized'))
                ->refresh();
        }

        $item_id = $this->payload['id'] ?? null;
        $item_type = $this->payload['item_type'] ?? null;

        $lend_time = $input['lend_time'] ?? null;
        $lend_description = $input['lend_description'] ?? null;
        $user_id = $input['user_id'] ?? null;
        $plan_return_time = $input['plan_return_time'] ?? null;

        if (!$item_id || !$lend_time || !$lend_description || !$user_id || !$plan_return_time) {
            return $this->response()
                ->error(trans('main.parameter_missing'));
        }

        switch ($item_type) {
            case 'part':
                $item = PartRecord::where('id', $item_id)->first();
                break;
            default:
                $item = DeviceRecord::where('id', $item_id)->first();
        }

        if (!$item) {
            return $this->response()
                ->error(trans('main.record_none'));
        }

        $user = User::where('id', $user_id)->first();
        if (!$user) {
            return $this->response()
                ->error(trans('main.record_none'));
        }

        $lend_track = LendTrack::where('item_id', $item_id)->first();

        if (!empty($lend_track)) {
            return $this->response()
                ->error(trans('main.lend_same'));
        }

        $lend_track = new LendTrack();
        $lend_track->item_type = $item_type;
        $lend_track->item_id = $item_id;
        $lend_track->lend_time = $lend_time;
        $lend_track->lend_description = $lend_description;
        $lend_track->user_id = $user_id;
        $lend_track->plan_return_time = $plan_return_time;
        $lend_track->save();

        return $this->response()
            ->success(trans('main.success'))
            ->refresh();
    }

    /**
     * 构造表单
     */
    public function form()
    {
        $this->datetime('lend_time')
            ->required();
        $this->textarea('lend_description')
            ->required();
        $this->select('user_id')
            ->options(User::pluck('name', 'id'))
            ->required();
        $this->datetime('plan_return_time')
            ->required();
    }
}
