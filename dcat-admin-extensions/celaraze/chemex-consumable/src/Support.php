<?php


namespace Celaraze\Chemex\Consumable;


use Celaraze\Chemex\Consumable\Models\ConsumableTrack;

class Support
{
    public static function consumableAllNumber($consumable_id): float
    {
        $consumable_track = ConsumableTrack::where('consumable_id', $consumable_id)->first();
        if (empty($consumable_track)) {
            return 0;
        } else {
            return $consumable_track->number;
        }
    }
}
