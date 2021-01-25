<?php

namespace Celaraze\Chemex\Part\Http\Controllers;

use App\Admin\Actions\Grid\RowAction\MaintenanceCreateAction;
use App\Admin\Grid\Displayers\RowActions;
use App\Models\DepreciationRule;
use App\Models\DeviceRecord;
use App\Models\PurchasedChannel;
use App\Models\VendorRecord;
use App\Services\ExpirationService;
use App\Support\Info;
use Celaraze\Chemex\Part\Actions\Grid\BatchAction\PartRecordBatchDeleteAction;
use Celaraze\Chemex\Part\Actions\Grid\RowAction\PartRecordDeleteAction;
use Celaraze\Chemex\Part\Actions\Grid\RowAction\PartTrackCreateUpdateAction;
use Celaraze\Chemex\Part\Actions\Grid\ToolAction\PartRecordImportAction;
use Celaraze\Chemex\Part\Metrics\CheckPartPercentage;
use Celaraze\Chemex\Part\Metrics\PartAboutToExpireCounts;
use Celaraze\Chemex\Part\Metrics\PartExpiredCounts;
use Celaraze\Chemex\Part\Models\PartCategory;
use Celaraze\Chemex\Part\Repositories\PartRecord;
use Celaraze\Chemex\Part\Support;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;

/**
 * @property DeviceRecord device
 * @property int id
 * @property double price
 * @property string purchased
 */
class PartRecordController extends AdminController
{
    public function __construct()
    {
        $this->title = Support::trans('part-record.title');
    }

    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description($this->description()['index'] ?? trans('admin.list'))
            ->body(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->row(function (Row $row) {
                        $row->column(3, new CheckPartPercentage());
                        $row->column(3, new PartAboutToExpireCounts());
                        $row->column(3, new PartExpiredCounts());
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
        return Grid::make(new PartRecord(['category', 'vendor', 'device', 'depreciation']), function (Grid $grid) {
            $grid->column('id');
            $grid->column('qrcode', Support::trans('part-record.qrcode'))->qrcode(function () {
                return 'part:' . $this->id;
            }, 200, 200);
            $grid->column('asset_number', Support::trans('part-record.asset_number'));
            $grid->column('name', Support::trans('part-record.name'));
            $grid->column('description', Support::trans('part-record.description'));
            $grid->column('category.name', Support::trans('part-record.category.name'));
            $grid->column('vendor.name', Support::trans('part-record.vendor.name'));
            $grid->column('specification', Support::trans('part-record.specification'));
            $grid->column('sn', Support::trans('part-record.sn'));
            $grid->column('expiration_left_days', Support::trans('part-record.expiration_left_days'))->display(function () {
                return ExpirationService::itemExpirationLeftDaysRender('part', $this->id);
            });
            $grid->column('device.name', Support::trans('part-record.device.name'))->link(function () {
                if (!empty($this->device)) {
                    return route('device.records.show', $this->device['id']);
                }
            });
            $grid->column('depreciation.name', Support::trans('part-record.depreciation.name'));
            $grid->column('location', Support::trans('part-record.location'));

            $grid->actions(function (RowActions $actions) {
                if (Admin::user()->can('part.record.delete')) {
                    $actions->append(new PartRecordDeleteAction());
                }
                if (Admin::user()->can('part.track.create_update')) {
                    $actions->append(new PartTrackCreateUpdateAction());
                }
                if (Admin::user()->can('part.maintenance.create')) {
                    $actions->append(new MaintenanceCreateAction('part'));
                }
            });

            $grid->showColumnSelector();
            $grid->hideColumns(['description', 'price', 'expired', 'location']);

            $grid->quickSearch(
                'id',
                'name',
                'asset_number',
                'description',
                'category.name',
                'vendor.name',
                'specification',
                'sn',
                'device.name',
                'location'
            )
                ->placeholder('尝试搜索一下')
                ->auto(false);

            $grid->enableDialogCreate();
            $grid->disableDeleteButton();
            $grid->disableBatchDelete();

            $grid->batchActions([
                new PartRecordBatchDeleteAction()
            ]);

            $grid->tools([
                new PartRecordImportAction()
            ]);

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
        return Show::make($id, new PartRecord(['category', 'vendor', 'channel', 'device', 'depreciation']), function (Show $show) {
            $show->field('id');
            $show->field('name', Support::trans('part-record.name'));
            $show->field('asset_number', Support::trans('part-record.asset_number'));
            $show->field('description', Support::trans('part-record.description'));
            $show->field('category.name', Support::trans('part-record.category.name'));
            $show->field('vendor.name', Support::trans('part-record.vendor.name'));
            $show->field('channel.name', Support::trans('part-record.channel.name'));
            $show->field('device.name', Support::trans('part-record.device.name'));
            $show->field('specification', Support::trans('part-record.specification'));
            $show->field('sn', Support::trans('part-record.sn'));
            $show->field('price', Support::trans('part-record.price'));
            $show->field('expiration_left_days', Support::trans('part-record.expiration_left_days'))->as(function () {
                $part_record = \Celaraze\Chemex\Part\Models\PartRecord::where('id', $this->id)->first();
                if (!empty($part_record)) {
                    $depreciation_rule_id = Info::getDepreciationRuleId($part_record);
                    return Info::depreciationPrice($this->price, $this->purchased, $depreciation_rule_id);
                }
            });
            $show->field('purchased', Support::trans('part-record.purchased'));
            $show->field('expired', Support::trans('part-record.expired'));
            $show->field('depreciation.name', Support::trans('part-record.depreciation.name'));
            $show->field('depreciation.termination', Support::trans('part-record.depreciation.termination'));
            $show->field('location', Support::trans('part-record.location'));
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
        return Form::make(new PartRecord(), function (Form $form) {
            $form->display('id');
            $form->text('name', Support::trans('part-record.name'))->required();
            $form->select('category_id', Support::trans('part-record.category.name'))
                ->options(PartCategory::selectOptions())
                ->required();
            $form->text('specification', Support::trans('part-record.specification'))->required();
            $form->select('vendor_id', Support::trans('part-record.vendor.name'))
                ->options(VendorRecord::all()
                    ->pluck('name', 'id'))
                ->required();
            $form->divider();
            $form->text('asset_number', Support::trans('part-record.asset_number'));
            $form->text('description', Support::trans('part-record.description'));
            $form->select('purchased_channel_id', Support::trans('part-record.channel.name'))
                ->options(PurchasedChannel::all()
                    ->pluck('name', 'id'));
            $form->text('sn', Support::trans('part-record.sn'));
            $form->currency('price', Support::trans('part-record.price'));
            $form->date('purchased', Support::trans('part-record.purchased'));
            $form->date('expired', Support::trans('part-record.expired'));
            $form->select('depreciation_rule_id', Support::trans('part-record.depreciation.name'))
                ->options(DepreciationRule::all()
                    ->pluck('name', 'id'));
            $form->text('location', Support::trans('part-record.location'))
                ->help('记录存放位置，例如某个货架、某个抽屉。');

            $form->display('created_at');
            $form->display('updated_at');

            $form->disableDeleteButton();

            $form->disableCreatingCheck();
            $form->disableEditingCheck();
            $form->disableViewCheck();
        });
    }
}
