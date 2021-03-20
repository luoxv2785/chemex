<?php

namespace App\Observers;

use App\Models\DeviceRecord;
use App\Models\DeviceTrack;
use App\Models\PartTrack;
use App\Models\SoftwareTrack;

class DeviceRecordObserver
{
    /**
     * Handle the DeviceRecord "created" event.
     *
     * @param DeviceRecord $deviceRecord
     * @return void
     */
    public function created(DeviceRecord $deviceRecord)
    {
        //
    }

    /**
     * Handle the DeviceRecord "updated" event.
     *
     * @param DeviceRecord $deviceRecord
     * @return void
     */
    public function updated(DeviceRecord $deviceRecord)
    {
        //
    }

    /**
     * Handle the DeviceRecord "deleted" event.
     *
     * @param DeviceRecord $deviceRecord
     * @return void
     */
    public function deleted(DeviceRecord $deviceRecord)
    {
        // 软删除设备归属记录
        $device_tracks = DeviceTrack::where('device_id', $deviceRecord->id)->get();
        foreach ($device_tracks as $device_track) {
            $device_track->delete();
        }

        // 软删除配件归属记录
        $part_tracks = PartTrack::where('device_id', $deviceRecord->id)->get();
        foreach ($part_tracks as $part_track) {
            $part_track->delete();
        }

        // 软删除软件归属记录
        $software_tracks = SoftwareTrack::where('device_id', $deviceRecord->id)->get();
        foreach ($software_tracks as $software_track) {
            $software_track->delete();
        }

        // 软删除服务归属记录
        $service_tracks = SoftwareTrack::where('device_id', $deviceRecord->id)->get();
        foreach ($service_tracks as $service_track) {
            $service_track->delete();
        }
    }

    /**
     * Handle the DeviceRecord "restored" event.
     *
     * @param DeviceRecord $deviceRecord
     * @return void
     */
    public function restored(DeviceRecord $deviceRecord)
    {
        //
    }

    /**
     * Handle the DeviceRecord "force deleted" event.
     *
     * @param DeviceRecord $deviceRecord
     * @return void
     */
    public function forceDeleted(DeviceRecord $deviceRecord)
    {
        //
    }
}
