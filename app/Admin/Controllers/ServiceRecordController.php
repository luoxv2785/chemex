<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\RowAction\ServiceRecordCreateIssueAction;
use App\Admin\Actions\Grid\RowAction\ServiceRecordCreateUpdateTrackAction;
use App\Admin\Actions\Grid\RowAction\ServiceRecordDeleteAction;
use App\Admin\Grid\Displayers\RowActions;
use App\Admin\Repositories\ServiceRecord;
use App\Models\DeviceRecord;
use App\Models\PurchasedChannel;
use App\Support\Data;
use App\Support\Support;
use App\Traits\HasCustomFields;
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
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->add(Data::icon('record') . trans('main.record'), $this->grid(), true);
                $tab->addLink(Data::icon('track') . trans('main.track'), admin_route('service.tracks.index'));
                $tab->addLink(Data::icon('issue') . trans('main.issue'), admin_route('service.issues.index'));
                $tab->addLink(Data::icon('statistics') . trans('main.statistics'), admin_route('service.statistics'));
                $row->column(12, $tab);
            });
    }

    public function title()
    {
        return admin_trans_label('title');
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
                    return admin_route('device.records.show', [$this->device['id']]);
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

            $grid->quickSearch(
                array_merge([
                    'id',
                    'name',
                    'description',
                    'device.name'
                ], HasCustomFields::makeQuickSearch(new \App\Models\ServiceRecord()))
            )
                ->placeholder(trans('main.quick_search'))
                ->auto(false);

            $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
                $create->text('name')->required();
            });

            $grid->filter(function ($filter) {
                $filter->equal('device.name');
                HasCustomFields::makeFilter(new \App\Models\ServiceRecord(), $filter);
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
        return Show::make($id, new ServiceRecord(['channel', 'device']), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('description');
            $show->field('device.name');
            $show->field('price');
            $show->field('purchased');
            $show->field('expired');
            $show->field('channel.name');
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
            $form->currency('price');
            $form->date('purchased');
            $form->date('expired');

            if (Support::ifSelectCreate()) {
                $form->selectCreate('purchased_channel_id', admin_trans_label('Purchased Channel'))
                    ->options(PurchasedChannel::class)->ajax(admin_route('selection.purchased.channels'))
                    ->ajax(admin_route('selection.purchased.channels'))
                    ->url(admin_route('purchased.channels.create'));
            } else {
                $form->select('purchased_channel_id', admin_trans_label('Purchased Channel'))
                    ->options(PurchasedChannel::pluck('name', 'id'));
            }
            $form->display('created_at');
            $form->display('updated_at');

            $form->disableDeleteButton();

            $form->disableCreatingCheck();
            $form->disableEditingCheck();
            $form->disableViewCheck();
        });
    }
}
