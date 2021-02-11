<?php

namespace App\Models;

use Dcat\Admin\Models\Administrator;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @method static where(string $key, string $value1, string $value2 = null)
 * @method static pluck(string $string, string $string1)
 * @method static count()
 * @method static truncate()
 * @property int id
 * @property string username
 * @property string password
 * @property string name
 * @property int department_id
 * @property string gender
 * @property null|string title
 * @property null|string mobile
 * @property null|string email
 */
class User extends Administrator implements JWTSubject
{
    use HasFactory;
    use HasDateTimeFormatter;
    use Notifiable;
    use SoftDeletes;

    protected static function booted()
    {
        // 保存回调，demo模式下不允许修改管理员信息
        static::saving(function () {
            if (config('admin.demo')) {
                abort(401, '演示模式下不允许修改');
            }
        });
    }

    /**
     * 获取JWT验证器
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * 构造JWT自定义的声明key-values
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    /**
     * 用户有一个组织部门记录
     * @return HasOne
     */
    public function department(): HasOne
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}
