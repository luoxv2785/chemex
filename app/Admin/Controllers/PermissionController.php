<?php

namespace App\Admin\Controllers;

use App\Support\Data;
use Dcat\Admin\Http\Controllers\PermissionController as BasePermissionController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;


class PermissionController extends BasePermissionController
{
    public function index(Content $content): Content
    {
        return $content
            ->title(admin_trans_label('title'))
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink(Data::icon('user') . admin_trans_label('User'), admin_route('organization.users.index'));
                $tab->addLink(Data::icon('department') . admin_trans_label('Department'), admin_route('organization.departments.index'));
                $tab->addLink(Data::icon('role') . admin_trans_label('Role'), admin_route('organization.roles.index'));
                $tab->add(Data::icon('permission') . admin_trans_label('Permission'), $this->treeView(), true);
                $row->column(12, $tab);
            });
    }
}
