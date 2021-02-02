<?php

namespace Celaraze\Chemex\Consumable\Http\Controllers;

use Celaraze\Chemex\Consumable\Repositories\ConsumableTrack;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

class ConsumableTrackController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        return Grid::make(new ConsumableTrack(['consumable', 'staff']), function (Grid $grid) {
            $grid->model()->withTrashed()->orderBy('created_at', 'DESC');

            $grid->column('id');
            $grid->column('consumable.name');
            $grid->column('operator');
            $grid->column('number');
            $grid->column('change');
            $grid->column('staff.name');
            $grid->column('purchased');
            $grid->column('expired');

            $grid->disableCreateButton();
            $grid->disableDeleteButton();
            $grid->disableEditButton();

            $grid->toolsWithOutline(false);

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id): Show
    {
        return Show::make($id, new ConsumableTrack(['consumable', 'staff']), function (Show $show) {
            $show->field('id');
            $show->field('consumable.name');
            $show->field('operator');
            $show->field('number');
            $show->field('change');
            $show->field('staff.name');
            $show->field('purchased');
            $show->field('expired');
            $show->field('created_at');
            $show->field('updated_at');

            $show->disableEditButton();
            $show->disableDeleteButton();
            $show->disableQuickEdit();
        });
    }
}
