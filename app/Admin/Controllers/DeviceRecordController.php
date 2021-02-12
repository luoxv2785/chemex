<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\BatchAction\DeviceRecordBatchDeleteAction;
use App\Admin\Actions\Grid\RowAction\DeviceRecordCreateUpdateTrackAction;
use App\Admin\Actions\Grid\RowAction\DeviceRecordDeleteAction;
use App\Admin\Actions\Grid\RowAction\MaintenanceCreateAction;
use App\Admin\Actions\Grid\ToolAction\DeviceRecordImportAction;
use App\Admin\Grid\Displayers\RowActions;
use App\Admin\Repositories\DeviceRecord;
use App\Models\Department;
use App\Models\DepreciationRule;
use App\Models\DeviceCategory;
use App\Models\PurchasedChannel;
use App\Models\VendorRecord;
use App\Services\DeviceService;
use App\Services\ExpirationService;
use App\Services\ExportService;
use App\Support\Data;
use App\Support\Support;
use App\Traits\HasDeviceRelatedGrid;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Http\Request;

/**
 * @property int id
 * @property double price
 * @property string purchased
 * @property int depreciation_rule_id
 */
class DeviceRecordController extends AdminController
{
    use HasDeviceRelatedGrid;

    /**
     * 详情页构建器
     * 为了复写详情页的布局
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content): Content
    {
        $name = Support::deviceIdToUserName($id);
        $history = DeviceService::history($id);
        return $content
            ->title($this->title())
            ->description($this->description()['index'] ?? trans('admin.show'))
            ->body(function (Row $row) use ($id, $name, $history) {
                $row->column(7, $this->detail($id));
                $row->column(5, function (Column $column) use ($id, $name, $history) {
                    $column->row(Card::make()->content(admin_trans_label('Current User') . '：' . $name));
                    $related = Support::makeDeviceRelatedChartData($id);
                    $column->row(new Card(trans('main.related'), view('charts.device_related')->with('related', $related)));
                    $result = self::hasDeviceRelated($id);
                    $column->row(new Card(trans('main.part'), $result['part']));
                    $column->row(new Card(trans('main.software'), $result['software']));
                    $column->row(new Card(trans('main.service'), $result['service']));
                    $card = new Card(trans('main.history'), view('history')->with('data', $history));
                    $column->row($card->tool('<a class="btn btn-primary btn-xs" href="' . admin_route('export.device.history', ['device_id' => 1]) . '" target="_blank">' . admin_trans_label('Export To Excel') . '</a>'));
                });
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
        return Show::make($id, new DeviceRecord(['category', 'vendor', 'channel', 'user', 'user.department', 'depreciation']), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('asset_number');
            $show->field('description');
            $show->field('category.name');
            $show->field('vendor.name');
            $show->field('channel.name');
            $show->field('sn');
            $show->field('mac');
            $show->field('ip');
            $show->field('photo')->image();
            $show->field('price');
            $show->field('expiration_left_days', admin_trans_label('Depreciation Price'))->as(function () {
                $device_record = \App\Models\DeviceRecord::where('id', $this->id)->first();
                if (!empty($device_record)) {
                    $depreciation_rule_id = Support::getDepreciationRuleId($device_record);
                    return Support::depreciationPrice($this->price, $this->purchased, $depreciation_rule_id);
                }
            });
            $show->field('purchased');
            $show->field('expired');
            $show->field('user.name');
            $show->field('user.department.name');
            $show->field('security_password');
            $show->field('admin_password');
            $show->field('depreciation.name');
            $show->field('depreciation.termination');
            $show->field('location');
            $show->field('extended_fields')->view('extended_fields');
            $show->field('created_at');
            $show->field('updated_at');

            $show->disableDeleteButton();
        });
    }

    public function selectList(Request $request)
    {
        $q = $request->get('q');

        return \App\Models\DeviceRecord::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }

    public function index(Content $content): Content
    {
        return $content
            ->header($this->title())
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->add(Data::icon('record') . trans('main.record'), $this->grid(), true);
                $tab->addLink(Data::icon('category') . trans('main.category'), admin_route('device.categories.index'));
                $tab->addLink(Data::icon('track') . trans('main.track'), admin_route('device.tracks.index'));
                $tab->addLink(Data::icon('statistics') . trans('main.statistics'), admin_route('device.statistics'));
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
        return Grid::make(new DeviceRecord(['category', 'vendor', 'user', 'user.department', 'depreciation']), function (Grid $grid) {

            $grid->column('id');
            $grid->column('qrcode')->qrcode(function () {
                return 'device:' . $this->id;
            }, 200, 200);
            $grid->column('asset_number');
            $grid->column('photo')->image('', 50, 50);
            $grid->column('name')->display(function ($name) {
                $tag = Support::getSoftwareIcon($this->id);
                if (empty($tag)) {
                    return $name;
                } else {
                    return "<img alt='$tag' src='/static/images/icons/$tag.png' style='width: 25px;height: 25px;margin-right: 10px'/>$name";
                }
            });
            $grid->column('description');
            $grid->column('category.name');
            $grid->column('vendor.name');
            $grid->column('sn');
            $grid->column('mac');
            $grid->column('ip');
            $grid->column('price');
            $grid->column('expired');
            $grid->column('user.name');
            $grid->column('user.department.name');
            $grid->column('expiration_left_days', admin_trans_label('Expiration Left Days'))->display(function () {
                return ExpirationService::itemExpirationLeftDaysRender('device', $this->id);
            });
            $grid->column('depreciation.name');
            $grid->column('location');

            $grid->disableBatchDelete();
            $grid->disableDeleteButton();

            $grid->batchActions([
                new DeviceRecordBatchDeleteAction()
            ]);

            $grid->tools([
                new DeviceRecordImportAction()
            ]);

            $grid->actions(function (RowActions $actions) {
                if (Admin::user()->can('device.record.delete')) {
                    $actions->append(new DeviceRecordDeleteAction());
                }
                if (Admin::user()->can('device.track.create_update')) {
                    $actions->append(new DeviceRecordCreateUpdateTrackAction());
                }
                if (Admin::user()->can('device.maintenance.create')) {
                    $actions->append(new MaintenanceCreateAction('device'));
                }
            });

            $grid->showColumnSelector();
            $grid->hideColumns([
                'photo',
                'vendor.name',
                'description',
                'price',
                'expired',
                'depreciation.name',
                'location',
                'expiration_left_days',
                'user.department.name'
            ]);

            $grid->quickSearch(
                'id',
                'name',
                'asset_number',
                'description',
                'category.name',
                'vendor.name',
                'sn',
                'mac',
                'ip',
                'price',
                'user.name',
                'user.department.name',
                'location'
            )
                ->placeholder(trans('main.quick_search'))
                ->auto(false);

            $grid->filter(function ($filter) {
                $filter->equal('category_id')->select(DeviceCategory::pluck('name', 'id'));
                $filter->equal('vendor_id')->select(VendorRecord::pluck('name', 'id'));
                $filter->equal('user.department_id')->select(Department::pluck('name', 'id'));
                $filter->equal('depreciation_id')->select(DepreciationRule::pluck('name', 'id'));
                $filter->equal('location');
            });

            $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
                $create->text('name')->required();
                $create->select('category_id', admin_trans_label('Category'))
                    ->options(DeviceCategory::pluck('name', 'id'))
                    ->required();
                $create->select('vendor_id', admin_trans_label('Vendor'))
                    ->options(VendorRecord::pluck('name', 'id'))
                    ->required();
            });
            $grid->enableDialogCreate();
            $grid->toolsWithOutline(false);
            $grid->export();
        });
    }

    /**
     * 履历导出
     * @param $device_id
     * @return mixed
     */
    public function exportHistory($device_id)
    {
        return ExportService::deviceHistory($device_id);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        return Form::make(new DeviceRecord(), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();

            if (Support::ifSelectCreate()) {
                $form->selectCreate('category_id', admin_trans_label('Category'))
                    ->options(DeviceCategory::class)
                    ->ajax(admin_route('selection.device.categories'))
                    ->url(admin_route('device.categories.create'))
                    ->required();
                $form->selectCreate('vendor_id', admin_trans_label('Vendor'))
                    ->options(VendorRecord::class)
                    ->ajax(admin_route('selection.vendor.records'))
                    ->url(admin_route('vendor.records.create'))
                    ->required();
            } else {
                $form->select('category_id', admin_trans_label('Category'))
                    ->options(DeviceCategory::pluck('name', 'id'))
                    ->required();
                $form->select('vendor_id', admin_trans_label('Vendor'))
                    ->options(VendorRecord::pluck('name', 'id'))
                    ->required();
            }

            $form->divider();
            $form->text('asset_number');
            $form->text('description');

            if (Support::ifSelectCreate()) {
                $form->selectCreate('purchased_channel_id', admin_trans_label('Purchased Channel'))
                    ->options(PurchasedChannel::class)
                    ->ajax(admin_route('selection.purchased.channels'))
                    ->url(admin_route('purchased.channels.create'));
            } else {
                $form->select('purchased_channel_id', admin_trans_label('Purchased Channel'))
                    ->options(PurchasedChannel::pluck('name', 'id'));
            }

            $form->text('sn');
            $form->text('mac');
            $form->text('ip');
            $form->image('photo')
                ->autoUpload()
                ->uniqueName()
                ->help(admin_trans_label('Photo Help'));
            $form->currency('price');
            $form->date('purchased');
            $form->date('expired')
                ->attribute('autocomplete', 'off');
            $form->password('security_password')
                ->attribute('autocomplete', 'new-password')
                ->help(admin_trans_label('Security Password Help'));
            $form->password('admin_password')
                ->help(admin_trans_label('Admin Password Help'));

            if (Support::ifSelectCreate()) {
                $form->selectCreate('depreciation_rule_id', admin_trans_label('Depreciation Rule'))
                    ->options(DepreciationRule::class)
                    ->ajax(admin_route('selection.depreciation.rules'))
                    ->url(admin_route('depreciation.rules.create'))
                    ->help(admin_trans_label('Depreciation Rule Help'));
            } else {
                $form->select('depreciation_rule_id', admin_trans_label('Depreciation Rule'))
                    ->options(DepreciationRule::pluck('name', 'id'))
                    ->help(admin_trans_label('Depreciation Rule Help'));
            }
            $form->text('location')
                ->help(admin_trans_label('Location Help'));
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
