<?php

namespace Celaraze\Chemex\Software\Http\Controllers;

use App\Admin\Grid\Displayers\RowActions;
use App\Models\DeviceRecord;
use App\Models\PurchasedChannel;
use App\Models\VendorRecord;
use App\Services\ExpirationService;
use App\Support\Data;
use App\Support\Info;
use Celaraze\Chemex\Software\Actions\Grid\BatchAction\SoftwareRecordBatchDeleteAction;
use Celaraze\Chemex\Software\Actions\Grid\RowAction\SoftwareRecordDeleteAction;
use Celaraze\Chemex\Software\Actions\Grid\RowAction\SoftwareTrackCreateUpdateAction;
use Celaraze\Chemex\Software\Actions\Grid\RowAction\SoftwareTrackDeleteAction;
use Celaraze\Chemex\Software\Actions\Grid\ToolAction\SoftwareRecordImportAction;
use Celaraze\Chemex\Software\Metrics\CheckSoftwarePercentage;
use Celaraze\Chemex\Software\Metrics\SoftwareAboutToExpireCounts;
use Celaraze\Chemex\Software\Metrics\SoftwareExpiredCounts;
use Celaraze\Chemex\Software\Models\SoftwareCategory;
use Celaraze\Chemex\Software\Repositories\SoftwareRecord;
use Celaraze\Chemex\Software\Repositories\SoftwareTrack;
use Celaraze\Chemex\Software\Services\SoftwareService;
use Celaraze\Chemex\Software\Support;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Card;

/**
 * @property  DeviceRecord device
 * @property  int id
 * @property  string deleted_at
 */
class SoftwareRecordController extends AdminController
{
    public function __construct()
    {
        $this->title = Support::trans('software-record.title');
    }

    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description($this->description()['index'] ?? trans('admin.list'))
            ->body(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->row(function (Row $row) {
                        $row->column(3, new CheckSoftwarePercentage());
                        $row->column(3, new SoftwareAboutToExpireCounts());
                        $row->column(3, new SoftwareExpiredCounts());
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
        return Grid::make(new SoftwareRecord(['category', 'vendor']), function (Grid $grid) {
            $grid->column('id');
            $grid->column('qrcode', Support::trans('software-record.qrcode'))->qrcode(function () {
                return 'software:' . $this->id;
            }, 200, 200);
            $grid->column('name', Support::trans('software-record.name'));
            $grid->column('description', Support::trans('software-record.description'));
            $grid->column('asset_number', Support::trans('software-record.asset_number'));
            $grid->column('category.name', Support::trans('software-record.category.name'));
            $grid->column('version', Support::trans('software-record.version'));
            $grid->column('vendor.name', Support::trans('software-record.vendor.name'));
            $grid->column('price', Support::trans('software-record.price'));
            $grid->column('purchased', Support::trans('software-record.purchased'));
            $grid->column('expired', Support::trans('software-record.expired'));
            $grid->column('distribution', Support::trans('software-record.distribution'))->using(Data::distribution());
            $grid->column('counts', Support::trans('software-record.counts'));
            $grid->column('left_counts', Support::trans('software-record.left_counts'))->display(function () {
                return Support::leftSoftwareCounts($this->id);
            });
            $grid->column('expiration_left_days', Support::trans('software-record.expiration_left_days'))->display(function () {
                return ExpirationService::itemExpirationLeftDaysRender('software', $this->id);
            });
            $grid->column('location', Support::trans('software-record.location'));

            $grid->actions(function (RowActions $actions) {
                if (Admin::user()->can('software.record.delete')) {
                    $actions->append(new SoftwareRecordDeleteAction());
                }
                if (Admin::user()->can('software.track.create_update')) {
                    $actions->append(new SoftwareTrackCreateUpdateAction());
                }
                if (Admin::user()->can('software.track.list')) {
                    $tracks_route = route('software.tracks.index', ['_search_' => $this->id]);
                    $actions->append("<a href='$tracks_route'>💿 管理归属</a>");
                }
            });

            $grid->showColumnSelector();
            $grid->hideColumns(['description', 'price', 'expired', 'location']);

            $grid->quickSearch(
                'id',
                'name',
                'asset_number',
                'category.name',
                'version',
                'price',
                'location'
            )
                ->placeholder('试着搜索一下')
                ->auto(false);

            $grid->enableDialogCreate();
            $grid->disableDeleteButton();
            $grid->disableBatchDelete();

            $grid->batchActions([
                new SoftwareRecordBatchDeleteAction()
            ]);

            $grid->tools([
                new SoftwareRecordImportAction()
            ]);

            $grid->toolsWithOutline(false);

            $grid->export();
        });
    }

    public function show($id, Content $content): Content
    {
        $history = SoftwareService::history($id);
        return $content
            ->title($this->title())
            ->description($this->description()['index'] ?? trans('admin.show'))
            ->body(function (Row $row) use ($id, $history) {
                // 判断权限
                if (!Admin::user()->can('software.track.list')) {
                    $row->column(12, $this->detail($id));
                } else {
                    $row->column(6, $this->detail($id));
                    $row->column(6, function (Column $column) use ($id, $history) {
                        $grid = Grid::make(new SoftwareTrack(['software', 'device', 'device.staff']), function (Grid $grid) use ($id) {
                            $grid->model()->where('software_id', '=', $id);
                            $grid->tableCollapse(false);
                            $grid->withBorder();

                            $grid->column('id');
                            $grid->column('device.name', Support::trans('software-record.device.name'))->link(function () {
                                if (!empty($this->device)) {
                                    return route('device.records.show', $this->device['id']);
                                }
                            });
                            $grid->column('device.staff.name', Support::trans('software-record.device.staff.name'));

                            $grid->disableToolbar();
                            $grid->disableBatchDelete();
                            $grid->disableRowSelector();
                            $grid->disableViewButton();
                            $grid->disableEditButton();
                            $grid->disableDeleteButton();

                            $grid->actions(function (RowActions $actions) {
                                if (Admin::user()->can('software.track.disable') && $this->deleted_at == null) {
                                    $actions->append(new SoftwareTrackDeleteAction());
                                }
                            });
                        });
                        $column->row(new Card('管理归属（授权）', $grid));
                        $card = new Card('履历', view('history')->with('data', $history));
                        $column->row($card->tool('<a class="btn btn-primary btn-xs" href="' . route('export.software.history', $id) . '" target="_blank">导出到 Excel</a>'));
                    });
                }
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
        return Show::make($id, new SoftwareRecord(['category', 'vendor', 'channel']), function (Show $show) {
            $show->field('id');
            $show->field('name', Support::trans('software-record.name'));
            $show->field('asset_number', Support::trans('software-record.asset_number'));
            $show->field('description', Support::trans('software-record.description'));
            $show->field('category.name', Support::trans('software-record.category.name'));
            $show->field('version', Support::trans('software-record.version'));
            $show->field('vendor.name', Support::trans('software-record.vendor.name'));
            $show->field('channel.name', Support::trans('software-record.channel.name'));
            $show->field('price', Support::trans('software-record.price'));
            $show->field('purchased', Support::trans('software-record.purchased'));
            $show->field('expired', Support::trans('software-record.expired'));
            $show->field('distribution', Support::trans('software-record.distribution'))->using(Data::distribution());
            $show->field('counts', Support::trans('software-record.counts'));
            $show->field('location', Support::trans('software-record.location'));
            $show->field('created_at');
            $show->field('updated_at');

            $show->disableDeleteButton();
        });
    }

    /**
     * 履历导出
     * @param $software_id
     * @return mixed
     */
    public function exportHistory($software_id)
    {
        return SoftwareService::exportHistory($software_id);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        return Form::make(new SoftwareRecord(), function (Form $form) {
            $form->display('id');
            $form->text('name', Support::trans('software-record.name'))->required();
            $form->text('version', Support::trans('software-record.version'))->required();

            if (Info::ifSelectCreate()) {
                $form->selectCreate('category_id', Support::trans('software-record.category.name'))
                    ->options(SoftwareCategory::class)
                    ->ajax(route('selection.software.categories'))
                    ->url(route('software.categories.create'))
                    ->required();
            } else {
                $form->select('category_id', Support::trans('software-record.category.name'))
                    ->options(SoftwareCategory::selectOptions())
                    ->required();
            }

            if (Info::ifSelectCreate()) {
                $form->selectCreate('vendor_id', Support::trans('software-record.vendor.name'))
                    ->options(VendorRecord::class)
                    ->ajax(route('selection.vendor.records'))
                    ->url(route('vendor.records.create'))
                    ->required();
            } else {
                $form->select('vendor_id', Support::trans('software-record.vendor.name'))
                    ->options(VendorRecord::all()->pluck('name', 'id'))
                    ->required();
            }

            $form->select('distribution', Support::trans('software-record.distribution'))
                ->options(Data::distribution())
                ->default('u')
                ->required();
            $form->number('counts', Support::trans('software-record.counts'))
                ->min(-1)
                ->default(1)
                ->required()
                ->help('"-1"表示无限制。');
            $form->divider();
            $form->text('sn', Support::trans('software-record.sn'));
            $form->text('description', Support::trans('software-record.description'));
            $form->text('asset_number', Support::trans('software-record.asset_number'));

            if (Info::ifSelectCreate()) {
                $form->selectCreate('purchased_channel_id', Support::trans('software-record.channel.name'))
                    ->options(VendorRecord::class)
                    ->ajax(route('selection.purchased.channels'))
                    ->url(route('purchased.channels.create'));
            } else {
                $form->select('purchased_channel_id', Support::trans('software-record.channel.name'))
                    ->options(PurchasedChannel::all()->pluck('name', 'id'));
            }

            $form->currency('price', Support::trans('software-record.price'))->default(0);
            $form->date('purchased', Support::trans('software-record.purchased'));
            $form->date('expired', Support::trans('software-record.expired'));
            $form->text('location', Support::trans('software-record.location'))
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
