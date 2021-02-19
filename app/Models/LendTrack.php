<?php

namespace App\Models;

use DateTime;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $key, string $value1, string $value2 = null)
 * @property string item_type
 * @property int item_id
 * @property DateTime lend_time
 * @property string lend_description
 * @property int user_id
 * @property DateTime plan_return_time
 */
class LendTrack extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = 'lend_tracks';

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
