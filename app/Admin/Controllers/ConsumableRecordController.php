<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\ToolAction\ConsumableInAction;
use App\Admin\Actions\Grid\ToolAction\ConsumableOutAction;
use App\Admin\Repositories\ConsumableRecord;
use App\Models\ConsumableCategory;
use App\Models\DeviceCategory;
use App\Models\VendorRecord;
use App\Support\Data;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Tab;


/**
 * @method allCounts()
 */
class ConsumableRecordController extends AdminController
{
    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->add(Data::icon('record') . trans('main.record'), $this->grid(), true);
                $tab->addLink(Data::icon('category') . trans('main.category'), admin_route('consumable.categories.index'));
                $tab->addLink(Data::icon('track') . trans('main.history'), admin_route('consumable.tracks.index'));
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
        return Grid::make(new ConsumableRecord(['category', 'vendor']), function (Grid $grid) {
            $grid->column('id');
            $grid->column('name');
            $grid->column('description');
            $grid->column('specification');
            $grid->column('category.name');
            $grid->column('vendor.name');
            $grid->column('price');
            $grid->column('number')->display(function () {
                return $this->allCounts();
            });

            $grid->toolsWithOutline(false);

            $grid->tools([
                new ConsumableInAction(),
                new ConsumableOutAction()
            ]);

            $grid->enableDialogCreate();
            $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
                $create->text('name')
                    ->required();
                $create->text('specification')
                    ->required();
                $create->select('category_id', admin_trans_label('Category'))
                    ->options(ConsumableCategory::pluck('name', 'id'))
                    ->required();
                $create->select('vendor_id', admin_trans_label('Vendor'))
                    ->options(VendorRecord::pluck('name', 'id'))
                    ->required();
            });

            $grid->filter(function ($filter) {
                $filter->equal('category_id')->select(DeviceCategory::pluck('name', 'id'));
                $filter->equal('vendor_id')->select(VendorRecord::pluck('name', 'id'));
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
        return Show::make($id, new ConsumableRecord(['category', 'vendor']), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('description');
            $show->field('specification');
            $show->field('category.name');
            $show->field('vendor.name');
            $show->field('price');
            $show->field('extended_fields')->view('extended_fields');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        return Form::make(new ConsumableRecord(), function (Form $form) {
            $form->display('id');
            $form->text('name')
                ->required();
            $form->text('specification')
                ->required();
            $form->select('category_id', admin_trans_label('Category'))
                ->options(ConsumableCategory::pluck('name', 'id'))
                ->required();
            $form->select('vendor_id', admin_trans_label('Vendor'))
                ->options(VendorRecord::pluck('name', 'id'))
                ->required();
            $form->divider();
            $form->text('description');
            $form->text('price');
            $form->table('extended_fields', function (Form\NestedForm $table) {
                $table->text('key', trans('main.key'));
                $table->textarea('value', trans('main.value'));
            });
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
