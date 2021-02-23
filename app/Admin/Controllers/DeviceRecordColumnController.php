<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Tree\ToolAction\DeviceCategoryImportAction;
use App\Admin\Repositories\DeviceRecord;
use Dcat\Admin\Form;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Tree;
use Illuminate\Support\Facades\DB;


class DeviceRecordColumnController extends AdminController
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
        return new Tree(new DeviceRecord(), function (Tree $tree) {
            $tree->maxDepth(1);
            $tree->disableCreateButton();
            $tree->disableDeleteButton();
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
        return Form::make(new DeviceRecord(), function (Form $form) {
            $form->saving(function (Form $form) {
                // orders的索引代表排序，orders['id']代表现在数据表中的排序
                $orders = request('_order');
                $orders = json_decode($orders, true);
                $columns = DB::select("select COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, EXTRA, COLUMN_DEFAULT from information_schema.COLUMNS where TABLE_NAME = 'device_records'");
                $columns = json_decode(json_encode($columns), true);
                foreach ($orders as $key => $order) {
                    if ($key == 0) {
                        $column_name = $columns[$order['id']]['COLUMN_NAME'];
                        $column_type = $columns[$order['id']]['COLUMN_TYPE'];
                        $sql_string = "alert table device_records modify $column_name $column_type first";
                    } else {
                        $sql_string = "alert table device_records modify $column_name $column_type first";
                    }
                }
            });
        });
    }
}
