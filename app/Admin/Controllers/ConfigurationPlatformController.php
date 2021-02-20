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
            ->title($this->title())
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->add(admin_trans_label('platform'), new Card(new ConfigurationPlatformForm()), true);
                $tab->addLink(admin_trans_label('extensions'), admin_route('configurations.extensions.index'));
                $tab->addLink(admin_trans_label('ldap'), admin_route('configurations.ldap.index'));
                $row->column(12, $tab);
            });
    }

    public function title()
    {
        return admin_trans_label('title');
    }
}
