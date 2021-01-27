<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $key, string $value, string $value2 = null)
 * @property string name
 */
class PurchasedChannel extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = 'purchased_channels';
}
