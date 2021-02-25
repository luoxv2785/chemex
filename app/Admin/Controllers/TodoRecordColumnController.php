<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Tree\RowAction\ToolAction\DeviceCategoryImportAction;
use App\Admin\Repositories\TodoRecord;
use App\Models\ColumnSort;
use Dcat\Admin\Form;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Tree;
use Illuminate\Support\Facades\Schema;


class TodoRecordColumnController extends AdminController
{
    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description(admin_trans_label('description'))
            ->body($this->treeView());
    }

    protected function treeView(): Tree
    {
        return new Tree(new TodoRecord(), function (Tree $tree) {
            $tree->maxDepth(1);
            $tree->disableCreateButton();
            $tree->disableDeleteButton();
            $tree->tools(function (Tree\Tools $tools) {
                $tools->add(new DeviceCategoryImportAction());
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        return Form::make(new TodoRecord(), function (Form $form) {
            $form->saving(function (Form $form) {
                // orders的索引代表排序，orders['id']代表现在数据表中的排序
                $table_name = \App\Models\TodoRecord::table();
                $db_columns = Schema::getColumnListing($table_name);
                $orders = request('_order');
                $orders = json_decode($orders, true);
                foreach ($orders as $key => $order) {
                    $field_name = $db_columns[$order['id']];
                    $column_sort = ColumnSort::where('field', $field_name)->first();
                    if (empty($column_sort)) {
                        $column_sort = new ColumnSort();
                    }
                    $column_sort->table_name = $table_name;
                    $column_sort->field = $field_name;
                    $column_sort->order = $key;
                    $column_sort->save();
                }
                return $form->response()
                    ->success(trans('main.success'))
                    ->refresh();
            });
        });
    }
}
