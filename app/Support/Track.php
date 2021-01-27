<?php


namespace App\Support;


use App\Models\CheckRecord;
use App\Models\CheckTrack;
use App\Models\DeviceTrack;

class Track
{
    /**
     * 获取设备当前最新的使用者
     * @param $device_id
     * @return string
     */
    public static function currentDeviceTrackStaff($device_id)
    {
        $device_track = DeviceTrack::where('device_id', $device_id)->first();
        if (empty($device_track)) {
            return 0;
        } else {
            $staff = $device_track->staff;
            if (empty($staff)) {
                return -1;
            } else {
                return $staff->id;
            }
        }
    }

    /**
     * 物品履历 形成清单数组（未排序）
     * @param $template
     * @param $item_track
     * @param array $data
     * @return array
     */
    public static function itemTrack($template, $item_track, $data = []): array
    {
        $template['status'] = '+';
        $template['datetime'] = json_decode($item_track, true)['created_at'];
        array_push($data, $template);
        if (!empty($item_track->deleted_at)) {
            $template['status'] = '-';
            $template['datetime'] = json_decode($item_track, true)['deleted_at'];
            array_push($data, $template);
        }
        return $data;
    }

    /**
     * 计算盘点任务记录的数量
     * @param $check_id
     * @param string $type
     * @return int
     */
    public static function checkTrackCounts($check_id, $type = 'A'): int
    {
        $check_record = CheckRecord::where('id', $check_id)->first();
        if (empty($check_record)) {
            return 0;
        }

        switch ($type) {
            case 'Y':
                $count = CheckTrack::where('check_id', $check_id)
                    ->where('status', 1)
                    ->count();
                break;
            case 'N':
                $count = CheckTrack::where('check_id', $check_id)
                    ->where('status', 2)
                    ->count();
                break;
            case 'L':
                $count = CheckTrack::where('check_id', $check_id)
                    ->where('status', 0)
                    ->count();
                break;
            default:
                $count = CheckTrack::where('check_id', $check_id)
                    ->withTrashed()
                    ->count();

        }

        return $count;
    }
}
