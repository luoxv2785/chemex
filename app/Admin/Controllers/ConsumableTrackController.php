<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ConsumableTrack;
use App\Support\Data;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Tab;


class ConsumableTrackController extends AdminController
{
    public function index(Content $content): Content
    {
        return $content
            ->title(admin_trans_label('title'))
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink(Data::icon('record') . trans('main.record'), admin_route('consumable.records.index'));
                $tab->addLink(Data::icon('category') . trans('main.category'), admin_route('consumable.categories.index'));
                $tab->add(Data::icon('track') . trans('main.history'), $this->grid(), true);
                $row->column(12, $tab);
            });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        return Grid::make(new ConsumableTrack(['consumable', 'user']), function (Grid $grid) {
            $grid->model()->withTrashed()->orderBy('created_at', 'DESC');

            $grid->column('id');
            $grid->column('consumable.name');
            $grid->column('operator');
            $grid->column('number');
            $grid->column('change');
            $grid->column('user.name');
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
        return Show::make($id, new ConsumableTrack(['consumable', 'user']), function (Show $show) {
            $show->field('id');
            $show->field('consumable.name');
            $show->field('operator');
            $show->field('number');
            $show->field('change');
            $show->field('user.name');
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
