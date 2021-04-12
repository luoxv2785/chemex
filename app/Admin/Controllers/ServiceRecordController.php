<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\RowAction\ServiceRecordCreateIssueAction;
use App\Admin\Actions\Grid\RowAction\ServiceRecordCreateUpdateTrackAction;
use App\Admin\Actions\Grid\RowAction\ServiceRecordDeleteAction;
use App\Admin\Actions\Show\ServiceRecordDeleteTrackAction;
use App\Admin\Grid\Displayers\RowActions;
use App\Admin\Repositories\ServiceRecord;
use App\Form;
use App\Grid;
use App\Models\ColumnSort;
use App\Models\DeviceRecord;
use App\Models\PurchasedChannel;
use App\Show;
use App\Support\Data;
use App\Support\Support;
use App\Traits\ControllerHasCustomColumns;
use App\Traits\ControllerHasDeviceRelatedGrid;
use App\Traits\ControllerHasTab;
use DateTime;
use Dcat\Admin\Admin;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show\Tools;
use Dcat\Admin\Widgets\Tab;

/**
 * @property  DeviceRecord device
 * @property DateTime deleted_at
 * @method track()
 */
class ServiceRecordController extends AdminController
{
    use ControllerHasDeviceRelatedGrid;
    use ControllerHasCustomColumns;
    use ControllerHasTab;

    /**
     * 标签布局.
     * @return Row
     */
    public function tab(): Row
    {
        $row = new Row();
        $tab = new Tab();
        $tab->add(Data::icon('record') . trans('main.record'), $this->renderGrid(), true);
        $tab->addLink(Data::icon('track') . trans('main.track'), admin_route('service.tracks.index'));
        $tab->addLink(Data::icon('issue') . trans('main.issue'), admin_route('service.issues.index'));
        $tab->addLink(Data::icon('statistics') . trans('main.statistics'), admin_route('service.statistics'));
        $tab->addLink(Data::icon('column') . trans('main.column'), admin_route('service.columns.index'));
        $row->column(12, $tab);
        return $row;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        return Grid::make(new ServiceRecord(['device', 'channel']), function (Grid $grid) {
            $sort_columns = $this->sortColumns();
            $grid->column('id', '', $sort_columns);
            $grid->column('name', '', $sort_columns);
            $grid->column('description', '', $sort_columns);
            $grid->column('status', '', $sort_columns)->switch('green');
            $grid->column('device.asset_number', '', $sort_columns)->link(function () {
                if (!empty($this->device)) {
                    return admin_route('device.records.show', [$this->device['id']]);
                }
            });
            $grid->column('channel.name', '', $sort_columns);
            $grid->column('created_at', '', $sort_columns);
            $grid->column('updated_at', '', $sort_columns);

            ControllerHasCustomColumns::makeGrid((new ServiceRecord())->getTable(), $grid, $sort_columns);

            /**
             * 行操作按钮.
             */
            $grid->actions(function (RowActions $actions) {
                if ($this->deleted_at == null) {
                    // @permissions
                    if (Admin::user()->can('service.record.delete')) {
                        $actions->append(new ServiceRecordDeleteAction());
                    }
                    // @permissions
                    if (Admin::user()->can('service.record.track.create_update')) {
                        $actions->append(new ServiceRecordCreateUpdateTrackAction());
                    }
                    // @permissions
                    if (Admin::user()->can('service.record.issue.create')) {
                        $actions->append(new ServiceRecordCreateIssueAction());
                    }
                }
            });

            /**
             * 字段过滤.
             */
            $grid->showColumnSelector();

            /**
             * 快速搜索.
             */
            $grid->quickSearch(
                array_merge([
                    'id',
                    'name',
                    'description',
                    'device.asset_number',
                ], ControllerHasCustomColumns::makeQuickSearch((new ServiceRecord())->getTable()))
            )
                ->placeholder(trans('main.quick_search'))
                ->auto(false);

            /**
             * 筛选.
             */
            $grid->filter(function ($filter) {
                if (admin_setting('switch_to_filter_panel')) {
                    $filter->panel();
                }
                $filter->scope('history', admin_trans_label('Deleted'))->onlyTrashed();
                $filter->equal('device.name');
                /**
                 * 自定义字段.
                 */
                ControllerHasCustomColumns::makeFilter((new ServiceRecord())->getTable(), $filter);
            });

            /**
             * 按钮控制.
             */
            $grid->enableDialogCreate();
            $grid->disableRowSelector();
            $grid->disableDeleteButton();
            $grid->disableBatchActions();
            $grid->toolsWithOutline(false);
            if (!request('_scope_')) {
                // @permissions
                if (!Admin::user()->can('service.record.create')) {
                    $grid->disableCreateButton();
                }
                // @permissions
                if (!Admin::user()->can('service.record.update')) {
                    $grid->disableEditButton();
                }
            }
            // @permissions
            if (Admin::user()->can('service.record.export')) {
                $grid->export();
            }
        });
    }

    /**
     * 返回字段排序.
     *
     * @return mixed
     */
    public function sortColumns()
    {
        return ColumnSort::where('table_name', (new ServiceRecord())->getTable())
            ->get(['name', 'order'])
            ->toArray();
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
            $sort_columns = $this->sortColumns();
            $show->field('id', '', $sort_columns);
            $show->field('name', '', $sort_columns);
            $show->field('description', '', $sort_columns);
            $show->field('device.asset_number', '', $sort_columns);
            $show->field('price', '', $sort_columns);
            $show->field('purchased', '', $sort_columns);
            $show->field('expired', '', $sort_columns);
            $show->field('channel.name', '', $sort_columns);

            /**
             * 自定义字段.
             */
            ControllerHasCustomColumns::makeDetail((new ServiceRecord())->getTable(), $show, $sort_columns);

            $show->field('created_at', '', $sort_columns);
            $show->field('updated_at', '', $sort_columns);

            /**
             * 自定义按钮.
             */
            $show->tools(function (Tools $tools) {
                // @permissions
                if (Admin::user()->can('service.track.delete') && !empty($this->track()->first())) {
                    $tools->append(new ServiceRecordDeleteTrackAction());
                }
                // @permissions
                if (Admin::user()->can('service.record.track.create_update') && empty($this->track()->first())) {
                    $tools->append(new \App\Admin\Actions\Show\ServiceRecordCreateUpdateTrackAction());
                }
                $tools->append('&nbsp;');
            });

            /**
             * 按钮控制.
             */
            $show->disableDeleteButton();
            // @permissions
            if (!Admin::user()->can('service.record.update')) {
                $show->disableEditButton();
            }
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
                $form->selectCreate('purchased_channel_id')
                    ->options(PurchasedChannel::class)->ajax(admin_route('selection.purchased.channels'))
                    ->ajax(admin_route('selection.purchased.channels'))
                    ->url(admin_route('purchased.channels.create'));
            } else {
                $form->select('purchased_channel_id')
                    ->options(PurchasedChannel::pluck('name', 'id'));
            }

            /**
             * 自定义字段.
             */
            ControllerHasCustomColumns::makeForm((new ServiceRecord())->getTable(), $form);

            $form->display('created_at');
            $form->display('updated_at');

            /**
             * 按钮控制.
             */
            $form->disableDeleteButton();
            $form->disableCreatingCheck();
            $form->disableEditingCheck();
            $form->disableViewCheck();
        });
    }
}
