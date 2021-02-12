<?php

namespace App\Admin\Forms;

use App\Models\DeviceRecord;
use App\Models\SoftwareRecord;
use App\Models\SoftwareTrack;
use App\Support\Support;
use Dcat\Admin\Admin;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;


class SoftwareRecordCreateUpdateTrackForm extends Form
{
    use LazyWidget;

    /**
     * 处理表单提交逻辑
     * @param array $input
     * @return JsonResponse
     */
    public function handle(array $input): JsonResponse
    {
        if (!Admin::user()->can('software.track.create_update')) {
            return $this->response()
                ->error(trans('main.unauthorized'))
                ->refresh();
        }

        // 获取软件id
        $software_id = $this->payload['id'] ?? null;

        // 获取设备id，来自表单传参
        $device_id = $input['device_id'] ?? null;

        // 如果没有软件id或者设备id则返回错误
        if (!$software_id || !$device_id) {
            return $this->response()
                ->error(trans('main.parameter_missing'));
        }

        // 软件记录
        $software = SoftwareRecord::where('id', $software_id)->first();
        // 如果没有找到这个软件记录则返回错误
        if (!$software) {
            return $this->response()
                ->error(trans('main.record_none'));
        }

        // 设备记录
        $device = DeviceRecord::where('id', $device_id)->first();
        // 如果没有找到这个设备记录则返回错误
        if (!$device) {
            return $this->response()
                ->error(trans('main.record_none'));
        }

        // 软件追踪
        $software_track = SoftwareTrack::where('software_id', $software_id)
            ->first();

        // 如果软件授权数量为非无限制
        if ($software->counts != -1) {
            $software_tracks = SoftwareTrack::where('software_id', $software_id)
                ->get();
            $used = count($software_tracks);
            $diff = $software->counts - $used;
            if ($diff <= 0) {
                return $this->response()
                    ->error('软件可用授权数量不足，无法归属');
            }
        }

        // 如果软件追踪非空，则删除旧追踪，为了留下流水记录
        if (!empty($software_track)) {
            // 如果新设备和旧设备相同，返回错误
            if ($software_track->device_id == $device_id) {
                return $this->response()
                    ->error(trans('main.no_change'));
            }
        }

        // 创建新的配件追踪
        $software_track = new SoftwareTrack();
        $software_track->software_id = $software_id;
        $software_track->device_id = $device_id;
        $software_track->save();

        return $this->response()
            ->success(trans('main.success'))
            ->refresh();
    }

    /**
     * 构造表单
     */
    public function form()
    {
        if (Support::ifSelectCreate()) {
            $this->selectCreate('device_id')
                ->options(DeviceRecord::class)
                ->ajax(admin_route('selection.device.records'))
                ->url(admin_route('device.records.create'))
                ->help(admin_trans_label('Device Help'))
                ->required();
        } else {
            $this->select('device_id')
                ->options(DeviceRecord::pluck('name', 'id'))
                ->help(admin_trans_label('Device Help'))
                ->required();
        }
    }
}
