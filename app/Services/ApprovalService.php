<?php


namespace App\Services;


use App\Models\ApprovalRecord;

class ApprovalService
{
    /**
     * 删除流程.
     * @param $approval_id
     */
    public static function approvalDelete($approval_id)
    {
        $approval_record = ApprovalRecord::where('id', $approval_id)->first();
        if (!empty($approval_record)) {
            $approval_record->delete();
        }
    }
}
