<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Tree\ToolAction\ApprovalRecordCreateTrackAction;
use App\Admin\Grid\Displayers\RowActions;
use App\Admin\Repositories\ApprovalRecord;
use App\Admin\Repositories\ApprovalTrack;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\Tools\Selector;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Tree;

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
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     *
     * @return Content
     */
    public function show($id, Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description($this->description()['show'] ?? trans('admin.show'))
            ->body(function (Row $row) use ($id) {
                $row->column(12, $this->detail($id));
                $row->column(12, $this->treeView($id));
            });
    }

    public function treeView($id): Tree
    {
        return Tree::make(new ApprovalTrack(), function (Tree $tree) use ($id) {
            $tree->maxDepth(1);

            $tree->tools(function (Tree\Tools $tools) use ($id) {
                $tools->add(new ApprovalRecordCreateTrackAction($id));
            });
            $tree->disableCreateButton();
            $tree->disableQuickCreateButton();
            $tree->disableDeleteButton();
            $tree->disableEditButton();
            $tree->disableQuickEditButton();
        });
    }

    protected function detail($id): Show
    {
        return Show::make($id, new ApprovalRecord(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('description');
        });
    }

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
