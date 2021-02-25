<?php

namespace App\Admin\Actions\Tree\RowAction;

use App\Admin\Repositories\DeviceRecord;
use App\Models\ColumnSort;
use App\Models\CustomColumn;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Tree\RowAction;
use Exception;
use Illuminate\Http\Request;

class DeviceColumnDeleteAction extends RowAction
{
    public function __construct()
    {
        $this->title = '🔨 ' . admin_trans_label('Delete');
        parent::__construct($this->title);
    }

    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $order = $request->input('_key');
        $table_name = (new DeviceRecord())->getTable();
        $column_sort = ColumnSort::where('table_name', $table_name)
            ->where('order', $order)
            ->first();

        if (empty($column_sort)) {
            return $this->response()
                ->error(trans('main.record_none'));
        }

        $field = $column_sort->field;
        try {
            $custom_column = CustomColumn::where('table_name', $table_name)
                ->where('name', $field)
                ->first();
            if (!empty($custom_column)) {
                $custom_column->delete();
                $column_sort->delete();
                return $this->response()
                    ->success(trans('main.success'))
                    ->refresh();
            } else {
                return $this->response()
                    ->error(trans('main.record_none'))
                    ->refresh();
            }
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
