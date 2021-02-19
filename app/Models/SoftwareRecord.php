<?php

namespace App\Models;

use App\Traits\HasExtendedFields;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $key, string $value, string $value = null)
 * @method static whereBetween(string $string, array $array)
 * @method static count()
 * @property string name
 * @property string purchased
 * @property string version
 * @property int category_id
 * @property int vendor_id
 * @property double price
 * @property string expired
 * @property int purchased_channel_id
 * @property string asset_number
 * @property int counts
 */
class SoftwareRecord extends Model
{
    use HasDateTimeFormatter;
    use HasExtendedFields;
    use SoftDeletes;

    protected $table = 'software_records';

    /**
     * 软件记录有一个分类
     * @return HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(SoftwareCategory::class, 'id', 'category_id');
    }

    /**
     * 软件记录有一个厂商
     * @return HasOne
     */
    public function vendor(): HasOne
    {
        return $this->hasOne(VendorRecord::class, 'id', 'vendor_id');
    }

    /**
     * 软件记录有一个购入途径
     * @return HasOne
     */
    public function channel(): HasOne
    {
        return $this->hasOne(PurchasedChannel::class, 'id', 'purchased_channel_id');
    }

    /**
     * 软件剩余可用授权数量
     * @return int|string
     */
    public function leftCounts()
    {
        $used = $this->track()->count();
        if ($used == -1) {
            return '不受限';
        }
        return $this->counts - $used;
    }

    /**
     * 软件记录有很多追踪
     * @return HasMany
     */
    public function track(): HasMany
    {
        return $this->hasMany(SoftwareTrack::class, 'id', 'software_id');
    }
}
