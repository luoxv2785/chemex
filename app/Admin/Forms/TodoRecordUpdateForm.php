<?php

namespace App\Admin\Forms;

use App\Models\TodoRecord;
use App\Support\Data;
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
                ->error(trans('main.unauthorized'));
        }
        try {
            $todo_record = TodoRecord::where('id', $id)->first();
            if (empty($todo_record)) {
                return $this->response()
                    ->error(admin_trans_label('Record None'));
            }
            $todo_record->end = $end;
            $todo_record->done_description = $done_description;
            $todo_record->emoji = $emoji;
            $todo_record->save();
            $return = $this
                ->response()
                ->success(admin_trans_label('Update Success'))
                ->refresh();
        } catch (Exception $e) {
            $return = $this
                ->response()
                ->error(admin_trans_label('Update Fail') . $e->getMessage());
        }

        return $return;
    }

    /**
     * 构造表单
     */
    public function form()
    {
        $this->datetime('end')->required();
        $this->textarea('done_description')->required();
        $this->select('emoji')
            ->options(Data::emoji());
    }
}
