<?php


namespace App\Admin\Renderable;

use App\Admin\Actions\Grid\ToolAction\DeviceCategoryCreateAction;
use App\Admin\Repositories\DeviceCategory;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;


class DeviceCategoryTable extends LazyRenderable
{
    public function grid(): Grid
    {
        return Grid::make(new DeviceCategory(['parent', 'depreciation']), function (Grid $grid) {
            $grid->column('id');
            $grid->column('name');
            $grid->column('description');
            $grid->column('parent.name');
            $grid->column('depreciation.name');

            $grid->toolsWithOutline(false);
            $grid->disableActions();
            $grid->tools([
                new DeviceCategoryCreateAction()
            ]);

            $grid->quickSearch('id', 'name', 'description')
                ->placeholder('试着搜索一下')
                ->auto(false);
        });
    }
}
