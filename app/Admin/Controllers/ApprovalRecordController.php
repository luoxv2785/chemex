<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Displayers\RowActions;
use App\Admin\Repositories\ApprovalRecord;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\Tools\Selector;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;

/**
 * @property int item_id
 * @property string item
 * @property int status
 */
class ApprovalRecordController extends AdminController
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
            ->body($this->grid());
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
        return Grid::make(new ApprovalRecord(), function (Grid $grid) {
            $grid->column('id');
            $grid->column('name');
            $grid->column('description');
            $grid->column('created_at');
            $grid->column('updated_at');

            /**
             * 行操作按钮.
             */
            $grid->actions(function (RowActions $actions) {

            });

            $grid->quickSearch('id', 'name', 'description')
                ->placeholder(trans('main.quick_search'))
                ->auto(false);

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
        return Show::make($id, new ApprovalRecord(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('description');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    protected function form(): Form
    {
        return Form::make(new ApprovalRecord(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->editor('description');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
