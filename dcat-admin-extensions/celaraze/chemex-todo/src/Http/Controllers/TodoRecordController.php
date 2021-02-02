<?php

namespace Celaraze\Chemex\Todo\Http\Controllers;

use App\Admin\Grid\Displayers\RowActions;
use App\Models\DeviceRecord;
use App\Support\Data;
use Celaraze\Chemex\Todo\Actions\Grid\RowAction\TodoRecordUpdateAction;
use Celaraze\Chemex\Todo\Actions\Grid\ToolAction\TodoRecordCreateAction;
use Celaraze\Chemex\Todo\Repositories\TodoRecord;
use Celaraze\Chemex\Todo\Support;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Alert;

/**
 * @property  DeviceRecord device
 * @property  int id
 * @property  string deleted_at
 */
class TodoRecordController extends AdminController
{
    public function __construct()
    {
        $this->title = Support::trans('todo-record.title');
    }

    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description($this->description()['index'] ?? trans('admin.list'))
            ->body(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->row(function (Row $row) {

                    });
                });
                $row->column(12, $this->grid());
            });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        return Grid::make(new TodoRecord(['user']), function (Grid $grid) {
            $grid->column('id');
            $grid->column('name', Support::trans('todo-record.name'));
            $grid->column('start', Support::trans('todo-record.start'));
            $grid->column('end', Support::trans('todo-record.end'));
            $grid->column('priority', Support::trans('todo-record.priority'))->using(Support::priority());
            $grid->column('user.name', Support::trans('todo-record.user.name'));
            $grid->column('tags', Support::trans('todo-record.tags'))->explode()->label();
            $grid->column('emoji', Support::trans('todo-record.emoji'));

            $grid->actions(function (RowActions $actions) {
                if (empty($this->end)) {
                    $actions->append(new TodoRecordUpdateAction());
                }
            });

            $grid->tools([
                new TodoRecordCreateAction()
            ]);

            $grid->disableCreateButton();
            $grid->disableEditButton();

            $grid->toolsWithOutline(false);

            $grid->export();
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id): Show
    {
        return Show::make($id, new TodoRecord(), function (Show $show) {
            $show->field('id');
            $show->field('name', Support::trans('todo-record.name'));
            $show->field('description', Support::trans('todo-record.description'));
            $show->field('start', Support::trans('todo-record.start'));
            $show->field('end', Support::trans('todo-record.end'));
            $show->field('priority', Support::trans('todo-record.priority'));
            $show->field('user_id', Support::trans('todo-record.user.name'));
            $show->field('tags', Support::trans('todo-record.tags'));
            $show->field('done_description', Support::trans('todo-record.done_description'));
            $show->field('emoji', Support::trans('todo-record.emoji'));
            $show->field('created_at');
            $show->field('updated_at');

            $show->disableDeleteButton();
        });
    }

    /**
     * Make a form builder.
     * @return Alert
     */
    protected function form(): Alert
    {
        return Data::unsupportedOperationWarning();
    }
}
