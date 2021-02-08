<?php

namespace App\Admin\Forms;

use App\Models\DeviceRecord;
use App\Models\PartRecord;
use App\Models\PartTrack;
use App\Support\Support;
use Dcat\Admin\Admin;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;

/**
 * 设备记录分配使用者
 * Class DeviceRecordCreateUpdateTrackForm
 * @package App\Admin\Forms
 */
class PartRecordCreateUpdateTrackForm extends Form
{
    use LazyWidget;

    /**
     * 处理表单提交逻辑
     * @param array $input
     * @return JsonResponse
     */
    public function handle(array $input): JsonResponse
    {
        if (!Admin::user()->can('part.track.create_update')) {
            return $this->response()
                ->error(trans('main.unauthorized'))
                ->refresh();
        }

        // 获取配件id
        $part_id = $this->payload['id'] ?? null;

        // 获取设备id，来自表单传参
        $device_id = $input['device_id'] ?? null;

        // 如果没有配件id或者设备id则返回错误
        if (!$part_id || !$device_id) {
            return $this->response()
                ->error(trans('main.parameter_missing'));
        }

        // 配件记录
        $part = PartRecord::where('id', $part_id)->first();
        // 如果没有找到这个配件记录则返回错误
        if (!$part) {
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

        // 配件追踪
        $part_track = PartTrack::where('part_id', $part_id)
            ->first();

        // 如果配件追踪非空，则删除旧追踪，为了留下流水记录
        if (!empty($part_track)) {
            // 如果新设备和旧设备相同，返回错误
            if ($part_track->device_id == $device_id) {
                return $this->response()
                    ->error(trans('main.no_change'));
            } else {
                $part_track->delete();
            }
        }

        // 创建新的配件追踪
        $part_track = new PartTrack();
        $part_track->part_id = $part_id;
        $part_track->device_id = $device_id;
        $part_track->save();

        return $this->response()
            ->success(trans('success'))
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
