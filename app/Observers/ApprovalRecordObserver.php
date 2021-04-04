<?php

namespace App\Observers;

use App\Models\ApprovalRecord;
use App\Models\ApprovalTrack;

class ApprovalRecordObserver
{
    /**
     * Handle the ApprovalRecord "created" event.
     *
     * @param ApprovalRecord $approvalRecord
     * @return void
     */
    public function created(ApprovalRecord $approvalRecord)
    {
        //
    }

    /**
     * Handle the ApprovalRecord "updated" event.
     *
     * @param ApprovalRecord $approvalRecord
     * @return void
     */
    public function updated(ApprovalRecord $approvalRecord)
    {
        //
    }

    /**
     * Handle the ApprovalRecord "deleted" event.
     *
     * @param ApprovalRecord $approvalRecord
     * @return void
     */
    public function deleted(ApprovalRecord $approvalRecord)
    {
        // 软删除流程逻辑
        $approval_tracks = ApprovalTrack::where('approval_id', $approvalRecord->id)
            ->get();
        foreach ($approval_tracks as $approval_track) {
            $approval_track->delete();
        }
    }

    /**
     * Handle the ApprovalRecord "restored" event.
     *
     * @param ApprovalRecord $approvalRecord
     * @return void
     */
    public function restored(ApprovalRecord $approvalRecord)
    {
        //
    }

    /**
     * Handle the ApprovalRecord "force deleted" event.
     *
     * @param ApprovalRecord $approvalRecord
     * @return void
     */
    public function forceDeleted(ApprovalRecord $approvalRecord)
    {
        //
    }
}
