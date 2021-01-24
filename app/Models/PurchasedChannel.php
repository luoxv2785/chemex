<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, string $value)
 * @property string name
 */
class PurchasedChannel extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = 'purchased_channels';
}
