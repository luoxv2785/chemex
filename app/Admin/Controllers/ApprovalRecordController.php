<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Displayers\RowActions;
use App\Admin\Repositories\ApprovalRecord;
use App\Form;
use App\Support\Data;
use App\Traits\ControllerHasTab;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\Tools\Selector;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Tab;

/**
 * @property int item_id
 * @property string item
 * @property int status
 */
class ApprovalRecordController extends AdminController
{
    use ControllerHasTab;

    /**
     * 标签布局.
     * @return Row
     */
    public function tab(): Row
    {
        $row = new Row();
        $tab = new Tab();
        $tab->add(Data::icon('record') . trans('main.approval_record'), $this->renderGrid(), true);
        $tab->addLink(Data::icon('track') . trans('main.approval_track'), admin_route('approval.tracks.index'));
        $row->column(12, $tab);
        return $row;
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

            /**
             * 快速搜索
             */
            $grid->quickSearch('id', 'name', 'description')
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

    /**
     * 详情页.
     * @param $id
     * @return Show
     */
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

    /**
     * 表单.
     * @return Form
     */
    protected function form(): Form
    {
        return Form::make(new ApprovalRecord(), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();
            $form->text('description');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
