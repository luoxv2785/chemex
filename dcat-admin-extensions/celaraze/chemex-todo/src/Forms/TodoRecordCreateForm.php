<?php

namespace Celaraze\Chemex\Todo\Forms;

use App\Models\AdminUser;
use Celaraze\Chemex\Todo\Models\TodoRecord;
use Celaraze\Chemex\Todo\Support;
use Dcat\Admin\Admin;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Widgets\Form;
use Exception;

class TodoRecordCreateForm extends Form
{
    /**
     * 处理表单提交逻辑
     * @param array $input
     * @return JsonResponse
     */
    public function handle(array $input): JsonResponse
    {
        if (!Admin::user()->can('todo.record.create')) {
            return $this->response()
                ->error('你没有权限执行此操作！')
                ->refresh();
        }

        $name = $input['name'] ?? null;
        $start = $input['start'] ?? null;

        $priority = $input['priority'] ?? null;
        $description = $input['description'] ?? null;
        $user_id = $input['user_id'] ?? null;
        $tags = $input['tags'] ?? null;
        if (empty($name) || empty($start)) {
            return $this->response()
                ->error(Support::trans('main.required'));
        }
        try {
            $todo_record = new TodoRecord();
            $todo_record->name = $name;
            $todo_record->start = $start;
            $todo_record->priority = $priority;
            $todo_record->description = $description;
            $todo_record->user_id = $user_id;
            $todo_record->tags = $tags;
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
        $this->text('name', Support::trans('todo-record.name'))->required();
        $this->datetime('start', Support::trans('todo-record.start'))->required();
        $this->divider();
        $this->select('priority', Support::trans('todo-record.priority'))
            ->options(Support::priority())
            ->default('normal');
        $this->textarea('description', Support::trans('todo-record.description'));

        $this->select('user_id', Support::trans('todo-record.user.name'))
            ->options(AdminUser::all()
                ->pluck('name', 'id'));
        $this->tags('tags', Support::trans('todo-record.tags'))
            ->help('随意打上标签，输入后按空格新增。');
    }
}
