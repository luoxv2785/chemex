<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Tree\ToolAction\ConsumableCategoryImportAction;
use App\Admin\Repositories\ConsumableCategory;
use Dcat\Admin\Form;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Tree;
use Dcat\Admin\Widgets\Tab;

class ConsumableCategoryController extends AdminController
{
    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description(trans('admin.list'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink(admin_trans_label('consumable-record.records'), route('consumable.records.index'));
                $tab->add(admin_trans_label('consumable-category.categories'), $this->treeView(), true);
                $tab->addLink(admin_trans_label('consumable-track.tracks'), route('consumable.tracks.index'));
                $row->column(12, $tab);
            });
    }

    protected function treeView(): Tree
    {
        return new Tree(new \App\Models\ConsumableCategory(), function (Tree $tree) {
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
            $form->text('name')
                ->required();
            $form->text('description');
            $form->select('parent_id')
                ->options(\App\Models\ConsumableCategory::pluck('name', 'id'));

            $form->display('created_at');
            $form->display('updated_at');

            $form->disableCreatingCheck();
            $form->disableEditingCheck();
            $form->disableViewCheck();
        });
    }
}
