<?php

namespace Celaraze\Chemex\Consumable\Http\Controllers;

use App\Models\VendorRecord;
use Celaraze\Chemex\Consumable\Actions\Grid\ToolAction\ConsumableInAction;
use Celaraze\Chemex\Consumable\Actions\Grid\ToolAction\ConsumableOutAction;
use Celaraze\Chemex\Consumable\Models\ConsumableCategory;
use Celaraze\Chemex\Consumable\Repositories\ConsumableRecord;
use Celaraze\Chemex\Consumable\Support;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

class ConsumableRecordController extends AdminController
{
    public function __construct()
    {
        $this->title = Support::trans('consumable-record.title');
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
            $grid->column('name', Support::trans('consumable-record.name'));
            $grid->column('description', Support::trans('consumable-record.description'));
            $grid->column('specification', Support::trans('consumable-record.specification'));
            $grid->column('category.name', Support::trans('consumable-record.category.name'));
            $grid->column('vendor.name', Support::trans('consumable-record.vendor.name'));
            $grid->column('price', Support::trans('consumable-record.price'));
            $grid->column('number', Support::trans('consumable-record.number'))->display(function () {
                return Support::consumableAllNumber($this->id);
            });

            $grid->toolsWithOutline(false);

            $grid->tools([
                new ConsumableInAction(),
                new ConsumableOutAction()
            ]);

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
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
            $show->field('name', Support::trans('consumable-record.name'));
            $show->field('description', Support::trans('consumable-record.description'));
            $show->field('specification', Support::trans('consumable-record.specification'));
            $show->field('category.name', Support::trans('consumable-record.category.name'));
            $show->field('vendor.name', Support::trans('consumable-record.vendor.name'));
            $show->field('price', Support::trans('consumable-record.price'));
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
            $form->text('name', Support::trans('consumable-record.name'))
                ->required();
            $form->text('description', Support::trans('consumable-record.description'));
            $form->text('specification', Support::trans('consumable-record.specification'))
                ->required();
            $form->select('category_id', Support::trans('consumable-record.category.name'))
                ->options(ConsumableCategory::all()
                    ->pluck('name', 'id'))
                ->required();
            $form->select('vendor_id', Support::trans('consumable-record.vendor.name'))
                ->options(VendorRecord::all()
                    ->pluck('name', 'id'))
                ->required();
            $form->text('price', Support::trans('consumable-record.price'));

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
