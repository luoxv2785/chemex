<?php

namespace App\Admin\Controllers;

use App\Support\Data;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\RoleController as BaseRoleController;
use Dcat\Admin\Http\Repositories\Role;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;


class RoleController extends BaseRoleController
{
    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink(Data::icon('user') . admin_trans_label('User'), admin_route('organization.users.index'));
                $tab->addLink(Data::icon('department') . admin_trans_label('Department'), admin_route('organization.departments.index'));
                $tab->add(Data::icon('role') . admin_trans_label('Role'), $this->grid(), true);
                $tab->addLink(Data::icon('permission') . admin_trans_label('Permission'), admin_route('organization.permissions.index'));
                $row->column(12, $tab);
            });
    }

    public function title()
    {
        return admin_trans_label('title');
    }

    protected function grid(): Grid
    {
        return new Grid(new Role(), function (Grid $grid) {
            $grid->column('id', 'ID')->sortable();
            $grid->column('slug')->label('primary');
            $grid->column('name');

            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableEditButton();
            $grid->showQuickEditButton();
            $grid->quickSearch(['id', 'name', 'slug'])
                ->placeholder(trans('main.quick_search'))
                ->auto(false);
            $grid->enableDialogCreate();

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $roleModel = config('admin.database.roles_model');
                if ($roleModel::isAdministrator($actions->row->slug)) {
                    $actions->disableDelete();
                }
            });

            $grid->toolsWithOutline(false);
        });
    }
}
