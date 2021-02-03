<?php

namespace App\Admin\Controllers;

use App\Admin\Forms\ConfigurationPlatformForm;
use App\Http\Controllers\Controller;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Tab;

class ConfigurationPlatformController extends Controller
{
    /**
     * 页面
     * @param Content $content
     * @return Content
     */
    public function index(Content $content): Content
    {
        return $content
            ->title(admin_trans_label('Platform'))
            ->description(trans('admin.list'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->add('平台', new Card(new ConfigurationPlatformForm()), true);
                $tab->addLink('扩展', route('configurations.extensions.index'));
                $tab->addLink('LDAP', route('configurations.ldap.index'));
                $row->column(12, $tab);
            });
    }
}
