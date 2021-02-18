<?php

namespace App\Admin\Controllers;

use Dcat\Admin\Http\Controllers\ExtensionController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;

class ConfigurationExtensionController extends ExtensionController
{
    /**
     * 页面
     * @param Content $content
     * @return Content
     */
    public function index(Content $content): Content
    {
        return $content
            ->title(admin_trans_label('title'))
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink(admin_trans_label('platform'), admin_route('configurations.platform.index'));
                $tab->add(admin_trans_label('extensions'), $this->grid(), true);
                $tab->addLink(admin_trans_label('ldap'), admin_route('configurations.ldap.index'));
                $row->column(12, $tab);
            });
    }
}
