<?php

namespace App\Admin\Actions\Tree\RowAction;

use App\Models\CustomColumn;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Tree\RowAction;
use Exception;
use Illuminate\Http\Request;

class CustomColumnDeleteAction extends RowAction
{
    protected ?string $table_name;
    protected ?string $custom_column_name;

    public function __construct(string $table_name = null, string $custom_column_name = null)
    {
        parent::__construct();
        $this->title = '🔨 ' . admin_trans_label('Delete');
        $this->table_name = $table_name;
        $this->custom_column_name = $custom_column_name;
    }

    /**
     * 处理动作逻辑.
     *
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        try {
            $custom_column = CustomColumn::where('table_name', $request->table_name)
                ->where('name', $request->name)
                ->first();
            if (!empty($custom_column)) {
                $custom_column->delete();
            }

            return $this->response()
                ->success(trans('main.success'))
                ->refresh();
        } catch (Exception $exception) {
            return $this->response()
                ->error(trans('main.fail') . '：' . $exception->getMessage());
        }
    }

    /**
     * 对话框.
     *
     * @return string[]
     */
    public function confirm(): array
    {
        return [admin_trans_label('Delete Confirm'), admin_trans_label('Delete Confirm Description')];
    }

    protected function parameters(): array
    {
        return [
            'table_name' => $this->table_name,
            'name' => $this->custom_column_name
        ];
    }
}
