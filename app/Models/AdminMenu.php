<?php

namespace App\Models;

use Dcat\Admin\Models\Menu;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminMenu extends Menu
{
    use HasFactory;
    use HasDateTimeFormatter;
}
