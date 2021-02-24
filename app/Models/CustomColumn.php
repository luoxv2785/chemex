<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property string table_name
 * @property string name
 * @property string type
 * @property int is_nullable
 * @property string nick_name
 * @method static find(int $int)
 * @method static where(string $key, string $value1, string $value2 = null)
 */
class CustomColumn extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = 'custom_columns';
}
