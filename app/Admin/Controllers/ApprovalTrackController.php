<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Displayers\RowActions;
use App\Admin\Repositories\ApprovalTrack;
use App\Support\Data;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\Tools\Selector;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Tab;

/**
 * @property int item_id
 * @property string item
 * @property int status
 */
class ApprovalTrackController extends AdminController
{
    /**
     * Index interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->add(Data::icon('record') . trans('main.approval_record'), $this->grid(), true);
                $row->column(12, $tab);
            });
    }

    public function title()
    {
        return admin_trans_label('title');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        return Grid::make(new ApprovalTrack(), function (Grid $grid) {
            $grid->column('id');
            $grid->column('approval_id');
            $grid->column('checkers');
            $grid->column('order');
            $grid->column('created_at');
            $grid->column('updated_at');

            /**
             * 行操作按钮.
             */
            $grid->actions(function (RowActions $actions) {

            });

            /**
             * 快速搜索
             */
            $grid->quickSearch('id')
                ->placeholder(trans('main.quick_search'))
                ->auto(false);

            /**
             * 字段过滤
             */
            $grid->selector(function (Selector $selector) {

            });

            /**
             * 按钮控制.
             */
            $grid->disableBatchActions();
            $grid->disableRowSelector();
            $grid->toolsWithOutline(false);

        });
    }

    protected function detail($id): Show
    {
        return Show::make($id, new ApprovalTrack(), function (Show $show) {
            $show->field('id');
            $show->field('approval_id');
            $show->field('checkers');
            $show->field('order');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    protected function form(): Form
    {
        return Form::make(new ApprovalTrack(), function (Form $form) {
            $form->display('id');
            $form->text('approval_id')->required();
            $form->text('checkers');
            $form->text('order');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
