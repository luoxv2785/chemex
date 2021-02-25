<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Models\ColumnSort;
use App\Models\CustomColumn;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;
use Exception;

class CustomColumnDeleteAction extends RowAction
{
    public function __construct($title = null)
    {
        parent::__construct($title);
        $this->title = '🔨 ' . admin_trans_label('Delete');
    }

    /**
     * 处理动作逻辑
     * @return Response
     */
    public function handle(): Response
    {
        if (!Admin::user()->can('device.custom_column.delete')) {
            return $this->response()
                ->error(trans('main.unauthorized'))
                ->refresh();
        }

        try {
            $custom_column = CustomColumn::find($this->getKey());
            $column_sort = ColumnSort::where('table_name', $custom_column->table_name)
                ->where('field', $custom_column->name)
                ->first();
            if (!empty($column_sort)) {
                $column_sort->delete();
            }
            $custom_column->delete();

            return $this->response()
                ->success(trans('main.success'))
                ->refresh();
        } catch (Exception $exception) {
            return $this->response()
                ->error(trans('main.fail') . '：' . $exception->getMessage());
        }
    }

    /**
     * 对话框
     * @return string[]
     */
    public function confirm(): array
    {
        return [admin_trans_label('Delete Confirm'), admin_trans_label('Delete Confirm Description')];
    }
}
