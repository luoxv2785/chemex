<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Dcat\Admin\Traits\ModelTree;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

/**
 * @method static where(string $key, string $value, string $value = null)
 * @method static whereBetween(string $string, array $array)
 * @method static count()
 * @method static pluck(string $string, string $string1)
 * @method static find(mixed $id)
 * @property string name
 * @property string description
 * @property int category_id
 * @property int vendor_id
 * @property string sn
 * @property string mac
 * @property string ip
 * @property double price
 * @property string purchased
 * @property string expired
 * @property int purchased_channel_id
 * @property string security_password
 * @property string admin_password
 * @property string asset_number
 * @property int id
 * @property PartRecord part
 * @property SoftwareRecord software
 * @property ServiceRecord service
 * @property string title
 * @property int parent_id
 * @property int order
 * @property string field
 */
class DeviceRecord extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;

    /**
     * 这里需要给个别名，否则delete方法将会重复
     * 和下面的delete方法重写打配合调整优先级
     */
    use ModelTree {
        ModelTree::delete as traitDelete;
    }

    /**
     * 需要被包括进排序字段的字段，一般来说是虚拟出来的关联字段
     * @var string[]
     */
    public $sortIncludeColumns = [
        'category.name',
        'vendor.name',
        'user.name',
        'user.department.name',
        'expiration_left_days',
        'channel.name',
        'depreciation.name',
        'qrcode',
    ];

    /**
     * 需要被排除出排序字段的字段，一般来说是关联字段的原始字段
     * @var string[]
     */
    public $sortExceptColumns = [
        'category_id',
        'vendor_id',
        'purchased_channel_id',
        'depreciation_rule_id',
        'deleted_at',
    ];
    protected $table = 'device_records';

    /**
     * 复写这个是为了让delete方法的优先级满足：
     * 子类>trait>父类
     * 这个是因为字段管理中删除动作的需要
     * @return bool|null
     * @throws Exception
     */
    public function delete(): ?bool
    {
        return parent::delete();
    }

    /**
     * 设备记录有一个分类
     * @return HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(DeviceCategory::class, 'id', 'category_id');
    }

    /**
     * 设备记录有一个厂商
     * @return HasOne
     */
    public function vendor(): HasOne
    {
        return $this->hasOne(VendorRecord::class, 'id', 'vendor_id');
    }

    /**
     * 设备记录有一个购入途径
     * @return HasOne
     */
    public function channel(): HasOne
    {
        return $this->hasOne(PurchasedChannel::class, 'id', 'purchased_channel_id');
    }

    /**
     * 设备记录在远处有很多配件
     * @return HasManyThrough
     */
    public function part(): HasManyThrough
    {
        return $this->hasManyThrough(
            PartRecord::class,  // 远程表
            PartTrack::class,   // 中间表
            'device_id',    // 中间表对主表的关联字段
            'id',   // 远程表对中间表的关联字段
            'id',   // 主表对中间表的关联字段
            'part_id'); // 中间表对远程表的关联字段
    }

    /**
     * 设备记录在远处有很多软件
     * @return HasManyThrough
     */
    public function software(): HasManyThrough
    {
        return $this->hasManyThrough(
            SoftwareRecord::class,  // 远程表
            SoftwareTrack::class,  // 中间表
            'device_id',    // 中间表对主表的关联字段
            'id',   // 远程表对中间表的关联字段
            'id',   // 主表对中间表的关联字段
            'software_id'); // 中间表对远程表的关联字段
    }

    /**
     * 设备记录在远处有很多服务程序
     * @return HasManyThrough
     */
    public function service(): HasManyThrough
    {
        return $this->hasManyThrough(
            ServiceRecord::class,  // 远程表
            ServiceTrack::class,  // 中间表
            'device_id',    // 中间表对主表的关联字段
            'id',   // 远程表对中间表的关联字段
            'id',   // 主表对中间表的关联字段
            'service_id'); // 中间表对远程表的关联字段
    }

    /**
     * 对安全密码字段读取做解密转换
     * @param $security_password
     * @return array|string
     */
    public function getSecurityPasswordAttribute($security_password)
    {
        if (!empty($security_password)) {
            try {
                return Crypt::decryptString($security_password);
            } catch (Exception $exception) {
                return '密钥已损毁';
            }
        }
    }

    /**
     * 对安全密码字段写入做加密转换
     * @param $security_password
     */
    public function setSecurityPasswordAttribute($security_password)
    {
        $this->attributes['security_password'] = Crypt::encryptString($security_password);
    }

    /**
     * 对管理员密码字段读取做解密转换
     * @param $admin_password
     * @return array|string
     */
    public function getAdminPasswordAttribute($admin_password)
    {
        if (!empty($admin_password)) {
            try {
                return Crypt::decryptString($admin_password);
            } catch (Exception $exception) {
                return '密钥已损毁';
            }
        }
    }

    /**
     * 对管理员密码字段写入做加密转换
     * @param $admin_password
     */
    public function setAdminPasswordAttribute($admin_password)
    {
        $this->attributes['admin_password'] = Crypt::encryptString($admin_password);
    }

    /**
     * 设备分类有一个折旧规则
     * @return HasOne
     */
    public function depreciation(): HasOne
    {
        return $this->hasOne(DepreciationRule::class, 'id', 'depreciation_rule_id');
    }

    /**
     * 设备当前使用者
     * @return string
     */
    public function userName(): string
    {
        $user = $this->user()->first();
        if (empty($user)) {
            $name = '闲置';
        } else {
            $name = $user->name;
        }
        return $name;
    }

    /**
     * 设备记录在远处有一个使用者（用户）
     * @return HasOneThrough
     */
    public function user(): HasOneThrough
    {

        return $this->hasOneThrough(
            User::class,  // 远程表
            DeviceTrack::class,   // 中间表
            'device_id',    // 中间表对主表的关联字段
            'id',   // 远程表对中间表的关联字段
            'id',   // 主表对中间表的关联字段
            'user_id'); // 中间表对远程表的关联字段
    }

    /**
     * 判断设备是否借用状态
     * @return bool
     */
    public function isLend(): bool
    {
        $device_track = $this->track()->first();
        if (empty($device_track) || empty($device_track->lend_time)) {
            return false;
        }
        return true;
    }

    /**
     * 设备有很多归属记录
     * @return HasMany
     */
    public function track(): HasMany
    {
        return $this->hasMany(DeviceTrack::class, 'device_id', 'id');
    }
}
