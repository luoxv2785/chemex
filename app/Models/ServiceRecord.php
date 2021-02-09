<?php

namespace App\Models;

use App\Traits\HasExtendedFields;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $key, string $value)
 * @method static whereBetween(string $string, array $array)
 * @method static count()
 */
class ServiceRecord extends Model
{
    use HasDateTimeFormatter;
    use HasExtendedFields;
    use SoftDeletes;

    protected $table = 'service_records';

    /**
     * 配件记录有一个购入途径
     * @return HasOne
     */
    public function channel(): HasOne
    {
        return $this->hasOne(PurchasedChannel::class, 'id', 'purchased_channel_id');
    }

    /**
     * 服务程序在远处有一个设备记录
     * @return HasOneThrough
     */
    public function device(): HasOneThrough
    {
        return $this->hasOneThrough(
            DeviceRecord::class,  // 远程表
            ServiceTrack::class,   // 中间表
            'service_id',    // 中间表对主表的关联字段
            'id',   // 远程表对中间表的关联字段
            'id',   // 主表对中间表的关联字段
            'device_id'); // 中间表对远程表的关联字段
    }
}
