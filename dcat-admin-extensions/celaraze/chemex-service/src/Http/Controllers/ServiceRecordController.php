<?php

namespace Celaraze\Chemex\Service\Http\Controllers;

use App\Admin\Grid\Displayers\RowActions;
use App\Models\DeviceRecord;
use Celaraze\Chemex\Service\Actions\Grid\RowAction\ServiceIssueCreateAction;
use Celaraze\Chemex\Service\Actions\Grid\RowAction\ServiceRecordDeleteAction;
use Celaraze\Chemex\Service\Actions\Grid\RowAction\ServiceTrackCreateUpdateAction;
use Celaraze\Chemex\Service\Repositories\ServiceRecord;
use Celaraze\Chemex\Service\Support;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

/**
 * @property  DeviceRecord device
 */
class ServiceRecordController extends AdminController
{
    public function __construct()
    {
        $this->title = Support::trans('service-record.title');
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
            $grid->column('name', Support::trans('service-record.name'));
            $grid->column('description', Support::trans('service-record.description'));
            $grid->column('status', Support::trans('service-record.status'))->switch('green');
            $grid->column('device.name', Support::trans('service-record.device.name'))->link(function () {
                if (!empty($this->device)) {
                    return route('device.records.show', $this->device['id']);
                }
            });
            $grid->actions(function (RowActions $actions) {
                if (Admin::user()->can('service.record.delete')) {
                    $actions->append(new ServiceRecordDeleteAction());
                }
                if (Admin::user()->can('service.track.create_update')) {
                    $actions->append(new ServiceTrackCreateUpdateAction());
                }
                if (Admin::user()->can('service.issue.create')) {
                    $actions->append(new ServiceIssueCreateAction());
                }
            });

            $grid->enableDialogCreate();
            $grid->disableRowSelector();
            $grid->disableDeleteButton();
            $grid->disableBatchActions();

            $grid->toolsWithOutline(false);

            $grid->quickSearch('id', 'name', 'description', 'device.name')
                ->placeholder('试着搜索一下')
                ->auto(false);

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
            $show->field('name', Support::trans('service-record.name'));
            $show->field('description', Support::trans('service-record.description'));
            $show->field('device.name', Support::trans('service-record.device.name'));
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
            $form->text('name', Support::trans('service-record.name'))->required();
            $form->text('description', Support::trans('service-record.description'));
            $form->switch('status', Support::trans('service-record.status'))
                ->default(0)
                ->help('勾选此项为暂停服务。');

            $form->display('created_at');
            $form->display('updated_at');

            $form->disableDeleteButton();

            $form->disableCreatingCheck();
            $form->disableEditingCheck();
            $form->disableViewCheck();
        });
    }
}
