<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Tree\ToolAction\DeviceColumnDeleteAction;
use App\Admin\Repositories\DeviceRecord;
use App\Models\ColumnSort;
use App\Models\CustomColumn;
use App\Support\Data;
use Dcat\Admin\Form;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Tree;
use Dcat\Admin\Widgets\Box;
use Dcat\Admin\Widgets\Form as WidgetForm;
use Dcat\Admin\Widgets\Tab;
use Pour\Plus\LaravelAdmin;


class DeviceColumnController extends AdminController
{
    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink(Data::icon('record') . trans('main.record'), admin_route('device.records.index'));
                $tab->addLink(Data::icon('category') . trans('main.category'), admin_route('device.categories.index'));
                $tab->addLink(Data::icon('track') . trans('main.track'), admin_route('device.tracks.index'));
                $tab->addLink(Data::icon('statistics') . trans('main.statistics'), admin_route('device.statistics'));
                $tab->add(Data::icon('column') . trans('main.column'), $this->render(), true);
                $row->column(12, $tab);
            });
    }

    public function title()
    {
        return admin_trans_label('title');
    }

    protected function render(): Row
    {
        return new Row(function (Column $column) {
            $column->row(function (Row $row) {
                $row->column(7, $this->treeView());
                $row->column(5, $this->createBox());
            });
        });
    }

    protected function treeView(): Tree
    {
        return new Tree(new DeviceRecord(), function (Tree $tree) {
            $tree->maxDepth(1);
            $tree->actions(function (Tree\Actions $actions) {
                $actions->disableQuickEdit();
                $actions->disableEdit();
                $actions->disableDelete();
            });
            $tree->disableCreateButton();
            $tree->disableDeleteButton();
            $tree->tools(function (Tree\Tools $tools) {
                $tools->add(new DeviceColumnDeleteAction());
            });
        });
    }

    protected function createBox(): Box
    {
        $form = new WidgetForm();
        $form->text('name')
            ->help(admin_trans_label('Name Help'))
            ->required();
        $form->text('nick_name')
            ->help(admin_trans_label('Nick Name Help'))
            ->required();
        $form->select('type')->required()
            ->options(Data::customFieldTypes());
        $form->radio('is_nullable')
            ->options(LaravelAdmin::yesOrNo())
            ->help(admin_trans_label('Is Nullable Help'))
            ->default(0);
        return Box::make(trans('admin.new'), $form);
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
                $table_name = (new DeviceRecord())->getTable();
                if (request()->has('_order')) {
                    // orders的索引代表排序，orders['id']代表现在数据表中的排序
                    $needle_columns = (new DeviceRecord())->sortNeedleColumns();
                    $orders = request('_order');
                    $orders = json_decode($orders, true);
                    foreach ($orders as $key => $order) {
                        $column_name = $needle_columns[$order['id']];
                        $column_sort = ColumnSort::where('table_name', $table_name)
                            ->where('field', $column_name)
                            ->first();
                        if (empty($column_sort)) {
                            $column_sort = new ColumnSort();
                        }
                        $column_sort->table_name = $table_name;
                        $column_sort->field = $column_name;
                        $column_sort->order = $key;
                        $column_sort->save();
                    }
                    return $form->response()
                        ->success(trans('main.success'))
                        ->refresh();
                } else {
                    $exist = CustomColumn::where('table_name', $table_name)
                        ->where('name', $form->input('name'))
                        ->first();
                    if (!empty($exist)) {
                        return $form->response()
                            ->error(trans('main.record_same'));
                    }
                    $custom_column = new CustomColumn();
                    $custom_column->table_name = $table_name;
                    $custom_column->name = $form->input('name');
                    $custom_column->nick_name = $form->input('nick_name');
                    $custom_column->type = $form->input('type');
                    $custom_column->is_nullable = $form->input('is_nullable');
                    $custom_column->save();

                    return $form->response()
                        ->refresh();
                }

            });
        });
    }
}
