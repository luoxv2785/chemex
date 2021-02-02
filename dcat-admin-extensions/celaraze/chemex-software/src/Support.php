<?php


namespace Celaraze\Chemex\Software;

use Celaraze\Chemex\Software\Models\SoftwareRecord;
use Celaraze\Chemex\Software\Models\SoftwareTrack;

class Support
{
    /**
     * 获取软件当前剩余授权数量
     * @param $software_id
     * @return int|string
     */
    public static function leftSoftwareCounts($software_id)
    {
        $software = SoftwareRecord::where('id', $software_id)->first();
        if (empty($software)) {
            return '软件状态异常';
        }
        $software_tracks = SoftwareTrack::where('software_id', $software_id)->get();
        $used = count($software_tracks);
        if ($software->counts == -1) {
            return '不受限';
        } else {
            return $software->counts - $used;
        }
    }
}
