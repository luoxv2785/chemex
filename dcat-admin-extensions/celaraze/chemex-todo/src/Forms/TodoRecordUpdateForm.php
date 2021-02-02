<?php

namespace Celaraze\Chemex\Todo\Forms;

use App\Support\Data;
use Celaraze\Chemex\Todo\Models\TodoRecord;
use Celaraze\Chemex\Todo\Support;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Exception;

class TodoRecordUpdateForm extends Form
{
    use LazyWidget;

    /**
     * 处理表单提交逻辑
     * @param array $input
     * @return JsonResponse
     */
    public function handle(array $input): JsonResponse
    {
        $id = $this->payload['id'] ?? null;
        $end = $input['end'] ?? null;
        $done_description = $input['done_description'] ?? null;
        $emoji = $input['emoji'] ?? null;

        if (empty($end) || empty($done_description) || empty($id)) {
            return $this->response()
                ->error(Support::trans('main.required'));
        }
        try {
            $todo_record = TodoRecord::where('id', $id)->first();
            if (empty($todo_record)) {
                return $this->response()
                    ->error(Support::trans('main.none'));
            }
            $todo_record->end = $end;
            $todo_record->done_description = $done_description;
            $todo_record->emoji = $emoji;
            $todo_record->save();
            $return = $this
                ->response()
                ->success(Support::trans('main.success'))
                ->refresh();
        } catch (Exception $e) {
            $return = $this
                ->response()
                ->error(Support::trans('main.error') . $e->getMessage());
        }

        return $return;
    }

    /**
     * 构造表单
     */
    public function form()
    {
        $this->datetime('end', Support::trans('todo-record.end'))->required();
        $this->textarea('done_description', Support::trans('todo-record.done_description'))->required();
        $this->select('emoji', Support::trans('todo-record.emoji'))
            ->options(Data::emoji());
    }
}
