<?php

namespace Celaraze\Chemex\Consumable\Http\Controllers;

use Celaraze\Chemex\Consumable\Actions\Tree\ToolAction\ConsumableCategoryImportAction;
use Celaraze\Chemex\Consumable\Repositories\ConsumableCategory;
use Celaraze\Chemex\Consumable\Support;
use Dcat\Admin\Form;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Tree;

class ConsumableCategoryController extends AdminController
{
    public function __construct()
    {
        $this->title = Support::trans('consumable-category.title');
    }

    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description(trans('admin.list'))
            ->body(function (Row $row) {
                $row->column(12, $this->treeView());
            });
    }

    protected function treeView(): Tree
    {
        return new Tree(new \Celaraze\Chemex\Consumable\Models\ConsumableCategory(), function (Tree $tree) {
            $tree->tools(function (Tree\Tools $tools) {
                $tools->add(new ConsumableCategoryImportAction());
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        return Form::make(new ConsumableCategory(), function (Form $form) {
            $form->display('id');
            $form->text('name', Support::trans('consumable-category.name'))
                ->required();
            $form->text('description', Support::trans('consumable-category.description'));
            $form->select('parent_id', Support::trans('consumable-category.parent_id'))
                ->options(\Celaraze\Chemex\Consumable\Models\ConsumableCategory::all()
                    ->pluck('name', 'id'));

            $form->display('created_at');
            $form->display('updated_at');

            $form->disableCreatingCheck();
            $form->disableEditingCheck();
            $form->disableViewCheck();
        });
    }
}
