<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\RowAction\ServiceRecordCreateIssueAction;
use App\Admin\Actions\Grid\RowAction\ServiceRecordCreateUpdateTrackAction;
use App\Admin\Actions\Grid\RowAction\ServiceRecordDeleteAction;
use App\Admin\Grid\Displayers\RowActions;
use App\Admin\Repositories\ServiceRecord;
use App\Models\DeviceRecord;
use App\Support\Data;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Tab;

/**
 * @property  DeviceRecord device
 */
class ServiceRecordController extends AdminController
{
    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description(trans('admin.list'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->add(Data::icon('record') . trans('main.record'), $this->grid(), true);
                $tab->addLink(Data::icon('track') . trans('main.track'), admin_route('service.tracks.index'));
                $tab->addLink(Data::icon('issue') . trans('main.issue'), admin_route('service.issues.index'));
                $row->column(12, $tab);
            });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        return Grid::make(new ServiceRecord(['device']), function (Grid $grid) {
            $grid->column('id');
            $grid->column('name');
            $grid->column('description');
            $grid->column('status')->switch('green');
            $grid->column('device.name')->link(function () {
                if (!empty($this->device)) {
                    return admin_route('device.records.show', $this->device['id']);
                }
            });
            $grid->actions(function (RowActions $actions) {
                if (Admin::user()->can('service.record.delete')) {
                    $actions->append(new ServiceRecordDeleteAction());
                }
                if (Admin::user()->can('service.track.create_update')) {
                    $actions->append(new ServiceRecordCreateUpdateTrackAction());
                }
                if (Admin::user()->can('service.issue.create')) {
                    $actions->append(new ServiceRecordCreateIssueAction());
                }
            });

            $grid->enableDialogCreate();
            $grid->disableRowSelector();
            $grid->disableDeleteButton();
            $grid->disableBatchActions();

            $grid->toolsWithOutline(false);

            $grid->quickSearch('id', 'name', 'description', 'device.name')
                ->placeholder(trans('main.quick_search'))
                ->auto(false);

            $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
                $create->text('name')->required();
            });

            $grid->filter(function ($filter) {
                $filter->equal('device.name');
            });

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
        return Show::make($id, new ServiceRecord(['device']), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('description');
            $show->field('device.name');
            $show->field('extended_fields')->view('extended_fields');
            $show->field('created_at');
            $show->field('updated_at');

            $show->disableDeleteButton();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        return Form::make(new ServiceRecord(), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();
            $form->divider();
            $form->text('description');
            $form->switch('status')
                ->default(0)
                ->help(admin_trans_label('Status Help'));
            $form->table('extended_fields', function (Form\NestedForm $table) {
                $table->text('key', trans('main.key'));
                $table->textarea('value', trans('main.value'));
            });
            $form->display('created_at');
            $form->display('updated_at');

            $form->disableDeleteButton();

            $form->disableCreatingCheck();
            $form->disableEditingCheck();
            $form->disableViewCheck();
        });
    }
}
