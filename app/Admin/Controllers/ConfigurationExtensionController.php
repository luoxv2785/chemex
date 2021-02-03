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
            ->title(admin_trans_label('Extension'))
            ->description(trans('admin.list'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink('平台', route('configurations.platform.index'));
                $tab->add('扩展', $this->grid(), true);
                $tab->addLink('LDAP', route('configurations.ldap.index'));
                $row->column(12, $tab);
            });
    }
}
