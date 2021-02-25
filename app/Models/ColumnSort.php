<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $key, string $value1, string $value2 = null)
 */
class ColumnSort extends Model
{
    use HasFactory;
    use HasDateTimeFormatter;

    protected $table = 'column_sorts';

    public function customColumn(): HasOne
    {
        return $this->hasOne(CustomColumn::class, 'name', 'field');
    }
}
