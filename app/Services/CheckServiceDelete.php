<?php

namespace App\Services;

use App\Models\CheckTrack;
use App\Models\CheckRecord;
class CheckServiceDelete
{
    /**
     * 删除盘点记录.
     *
     * @param $check_id
     */
    public static function checktrackDelete($check_id)
    {
        $checktrack = CheckTrack::where('id', $check_id)->first();
        if (!empty($checktrack)) {
            $checktrack->delete();
        }
    }


    public static function checkrecordDelete($id)
    {
        $checkrecord = CheckRecord::where('id', $id)->first();
        if (!empty($checkrecord)) {
            $checkrecord->delete();
        }
    }
    /**
     * 删除盘点记录（强制）.
     *
     * @param $check_id
     */
    public static function checktrackForceDelete($check_id)
    {
        $checktrack = CheckTrack::where('id', $check_id)
            ->withTrashed()
            ->first();
        if (!empty($checktrack)) {
            $checktrack->forceDelete();
        }
    }
}
