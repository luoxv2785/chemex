<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $key, string $value)
 * @method static whereBetween(string $string, array $array)
 * @method static count()
 * @method static pluck(string $string, string $string1)
 * @method static find(int $int)
 * @property int id
 */
class ApprovalRecord extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = 'approval_records';

    public function track(): HasMany
    {
        return $this->hasMany(ApprovalTrack::class, 'approval_id', 'id');
    }
}
