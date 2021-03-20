<?php

namespace App\Observers;

use App\Models\PartRecord;
use App\Models\PartTrack;

class PartRecordObserver
{
    /**
     * Handle the PartRecord "created" event.
     *
     * @param PartRecord $partRecord
     * @return void
     */
    public function created(PartRecord $partRecord)
    {
        //
    }

    /**
     * Handle the PartRecord "updated" event.
     *
     * @param PartRecord $partRecord
     * @return void
     */
    public function updated(PartRecord $partRecord)
    {
        //
    }

    /**
     * Handle the PartRecord "deleted" event.
     *
     * @param PartRecord $partRecord
     * @return void
     */
    public function deleted(PartRecord $partRecord)
    {
        // 配件删除时，同时删除全部归属记录
        $part_tracks = PartTrack::where('part_id', $partRecord->id)->get();
        foreach ($part_tracks as $part_track) {
            $part_track->delete();
        }
    }

    /**
     * Handle the PartRecord "restored" event.
     *
     * @param PartRecord $partRecord
     * @return void
     */
    public function restored(PartRecord $partRecord)
    {
        //
    }

    /**
     * Handle the PartRecord "force deleted" event.
     *
     * @param PartRecord $partRecord
     * @return void
     */
    public function forceDeleted(PartRecord $partRecord)
    {
        //
    }
}
