<?php

namespace App\Notifications;

use App\Models\TodoRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;


class NewTodoRecord extends Notification
{
    use Queueable;

    public $todo_record;

    /**
     * Create a new notification instance.
     *
     * @param TodoRecord $todoRecord
     */
    public function __construct(TodoRecord $todoRecord)
    {
        $this->todo_record = $todoRecord;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via(): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'todo_record_id' => $this->todo_record->id,
            'title' => trans('new_todo_record_title'),
            'content' => trans('new_todo_record_content'),
            'expired' => $this->todo_record->end,
            'url' => admin_route('todo.records.show', [$this->todo_record->id])
        ];
    }
}
