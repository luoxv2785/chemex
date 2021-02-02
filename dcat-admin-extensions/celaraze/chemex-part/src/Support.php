<?php


namespace Celaraze\Chemex\Part;


use Celaraze\Chemex\Part\Models\PartTrack;

class Support
{
    /**
     * 获取配件当前归属的设备
     * @param $part_id
     * @return string
     */
    public static function currentPartTrack($part_id): string
    {
        $part_track = PartTrack::where('part_id', $part_id)->first();
        if (empty($part_track)) {
            return '闲置';
        } else {
            $device = $part_track->device;
            if (empty($device)) {
                return '设备失踪';
            } else {
                return $device->name;
            }
        }
    }
}
