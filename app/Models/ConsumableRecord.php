<?php

namespace App\Models;

use App\Traits\HasExtendedFields;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $key, string $value1, string $value2 = null)
 * @method static pluck(string $string, string $string1)
 */
class ConsumableRecord extends Model
{
    use HasDateTimeFormatter;
    use HasExtendedFields;
    use SoftDeletes;

    protected $table = 'consumable_records';

    public function category(): HasOne
    {
        return $this->hasOne(ConsumableCategory::class, 'id', 'category_id');
    }

    public function vendor(): HasOne
    {
        return $this->hasOne(VendorRecord::class, 'id', 'vendor_id');
    }

    /**
     * 耗材总数
     * @return HigherOrderBuilderProxy|int|mixed
     */
    public function allCounts()
    {
        $consumable_track = $this->track()->first();
        if (empty($consumable_track)) {
            return 0;
        } else {
            return $consumable_track->number;
        }
    }

    public function track(): HasMany
    {
        return $this->hasMany(ConsumableTrack::class, 'id', 'consumable_id');
    }
}
