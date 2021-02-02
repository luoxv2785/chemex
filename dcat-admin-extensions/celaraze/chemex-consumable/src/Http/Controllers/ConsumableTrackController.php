<?php

namespace Celaraze\Chemex\Consumable\Http\Controllers;

use Celaraze\Chemex\Consumable\Repositories\ConsumableTrack;
use Celaraze\Chemex\Consumable\Support;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

class ConsumableTrackController extends AdminController
{
    public function __construct()
    {
        $this->title = Support::trans('consumable-track.title');
    }

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
            $grid->column('consumable.name', Support::trans('consumable-track.consumable.name'));
            $grid->column('operator', Support::trans('consumable-track.operator'));
            $grid->column('number', Support::trans('consumable-track.number'));
            $grid->column('change', Support::trans('consumable-track.change'));
            $grid->column('staff.name', Support::trans('consumable-track.staff.name'));
            $grid->column('purchased', Support::trans('consumable-track.purchased'));
            $grid->column('expired', Support::trans('consumable-track.expired'));

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
            $show->field('consumable.name', Support::trans('consumable-track.consumable.name'));
            $show->field('operator', Support::trans('consumable-track.operator'));
            $show->field('number', Support::trans('consumable-track.number'));
            $show->field('change', Support::trans('consumable-track.change'));
            $show->field('staff.name', Support::trans('consumable-track.staff.name'));
            $show->field('purchased', Support::trans('consumable-track.purchased'));
            $show->field('expired', Support::trans('consumable-track.expired'));
            $show->field('created_at');
            $show->field('updated_at');

            $show->disableEditButton();
            $show->disableDeleteButton();
            $show->disableQuickEdit();
        });
    }
}
