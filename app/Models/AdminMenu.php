<?php

namespace App\Models;

use Dcat\Admin\Admin;
use Dcat\Admin\Models\Menu;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\App;

class AdminMenu extends Menu
{
    use HasFactory;
    use HasDateTimeFormatter;

    protected static function booted()
    {
        // 保存回调，demo模式下不允许修改菜单
        static::saving(function () {
            if (config('admin.demo')) {
                abort(401, '演示模式下不允许修改');
            }
        });
    }

    /**
     * 支持扩展菜单翻译
     * @param $value
     * @return string
     */
    public function getTitleAttribute($value): string
    {
        $extension_directories = Admin::extension()->getExtensionDirectories();
        $locale = App::getLocale();
        foreach ($extension_directories as $extension_directory) {
            $menu = "$extension_directory/resources/lang/$locale/menu.php";
            if (file_exists($menu)) {
                $menu = include($menu);
                $value = trim(str_replace(' ', '_', strtolower($value)));
                if (isset($menu[$value])) {
                    return $menu[$value];
                }
            }
        }
        return $value;
    }
}
