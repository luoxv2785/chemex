<?php

namespace App\Admin\Forms;

use App\Models\DeviceRecord;
use App\Models\DeviceTrack;
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
        if (!Admin::user()->can('device.track.create_update')) {
            return $this->response()
                ->error(trans('main.unauthorized'))
                ->refresh();
        }

        // 获取设备id
        $device_id = $this->payload['id'] ?? null;

        // 获取用户id，来自表单传参
        $user_id = $input['user_id'] ?? null;

        // 如果没有设备id或者用户id则返回错误
        if (!$device_id || !$user_id) {
            return $this->response()
                ->error(trans('main.parameter_missing'));
        }

        // 设备记录
        $device = DeviceRecord::where('id', $device_id)->first();
        // 如果没有找到这个设备记录则返回错误
        if (!$device) {
            return $this->response()
                ->error(trans('main.record_none'));
        }

        // 用户记录
        $user = User::where('id', $user_id)->first();
        // 如果没有找到这个用户记录则返回错误
        if (!$user) {
            return $this->response()
                ->error(trans('main.record_none'));
        }

        // 设备追踪
        $device_track = DeviceTrack::where('device_id', $device_id)->first();

        // 如果设备追踪非空，则删除旧追踪，为了留下流水记录
        if (!empty($device_track)) {
            // 如果新使用者和旧使用者相同，返回错误
            if ($device_track->user_id == $user_id) {
                return $this->response()
                    ->error(trans('main.record_same'));
            } else {
                $device_track->delete();
            }
        }

        // 创建新的设备追踪
        $device_track = new DeviceTrack();
        $device_track->device_id = $device_id;
        $device_track->user_id = $user_id;
        $device_track->save();

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
