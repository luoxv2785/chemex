<?php

namespace App\Admin\Forms;

use App\Models\CustomColumn;
use Dcat\Admin\Form\NestedForm;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Exception;
use Illuminate\Contracts\Support\Renderable;

class CustomColumnUpdateForm extends Form implements Renderable
{
    use LazyWidget;

    /**
     * 处理表单提交逻辑.
     *
     * @param array $input
     *
     * @return JsonResponse
     */
    public function handle(array $input): JsonResponse
    {
        $table_name = $this->payload['table_name'];
        $name = $this->payload['name'];
        $new_name = $input['new_name'] ?? null;
        $new_nick_name = $input['new_nick_name'] ?? null;
        $new_select_options = $input['new_select_options'] ?? null;

        // 如果没有设备id或者归还时间或者归还描述则返回错误
        if (!$table_name || !$name) {
            return $this->response()
                ->error(trans('main.parameter_missing'));
        }

        try {
            $custom_column = CustomColumn::where('table_name', $table_name)
                ->where('name', $name)
                ->first();

            if (empty($custom_column)) {
                return $this->response()
                    ->error(trans('main.record_none'));
            }

            if (!empty($new_name)) {
                $exist_name = CustomColumn::where('table_name', $table_name)
                    ->where('name', $new_name)
                    ->first();
                if (!empty($exist_name)) {
                    return $this->response()
                        ->error(trans('main.record_same'));
                }
                $custom_column->name = $new_name;
            } else {
                $custom_column->name = $name;
            }

            if (!empty($new_nick_name)) {
                $custom_column->nick_name = $new_nick_name;
            }

            if (!empty($new_select_options)) {
                $custom_column->select_options = $new_select_options;
            }

            $custom_column->save();

            return $this->response()
                ->success(trans('main.success'))
                ->refresh();
        } catch (Exception $exception) {
            return $this->response()
                ->error(trans('main.fail') . '：' . $exception->getMessage());
        }
    }

    /**
     * 构造表单.
     */
    public function form()
    {
        $this->text('name')
            ->readOnly()
            ->default($this->payload['name']);
        $this->text('new_name');
        $this->text('new_nick_name');

        $custom_column = CustomColumn::where('table_name', $this->payload['table_name'])
            ->where('name', $this->payload['name'])
            ->first();
        if (!empty($custom_column) && $custom_column->type == 'select') {
            $this->table('new_select_options', function (NestedForm $table) use ($custom_column) {
                $table->text('item');
            })->default($custom_column->select_options);
        }
    }
}
