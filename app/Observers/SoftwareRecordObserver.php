<?php

namespace App\Observers;

use App\Models\SoftwareRecord;
use App\Models\SoftwareTrack;

class SoftwareRecordObserver
{
    /**
     * Handle the SoftwareRecord "created" event.
     *
     * @param SoftwareRecord $softwareRecord
     * @return void
     */
    public function created(SoftwareRecord $softwareRecord)
    {
        //
    }

    /**
     * Handle the SoftwareRecord "updated" event.
     *
     * @param SoftwareRecord $softwareRecord
     * @return void
     */
    public function updated(SoftwareRecord $softwareRecord)
    {
        //
    }

    /**
     * Handle the SoftwareRecord "deleted" event.
     *
     * @param SoftwareRecord $softwareRecord
     * @return void
     */
    public function deleted(SoftwareRecord $softwareRecord)
    {
        // 删除软件记录的同时，删除全部归属记录
        $software_tracks = SoftwareTrack::where('software_id', $softwareRecord->id)->get();
        foreach ($software_tracks as $software_track) {
            $software_track->delete();
        }
    }

    /**
     * Handle the SoftwareRecord "restored" event.
     *
     * @param SoftwareRecord $softwareRecord
     * @return void
     */
    public function restored(SoftwareRecord $softwareRecord)
    {
        //
    }

    /**
     * Handle the SoftwareRecord "force deleted" event.
     *
     * @param SoftwareRecord $softwareRecord
     * @return void
     */
    public function forceDeleted(SoftwareRecord $softwareRecord)
    {
        //
    }
}
