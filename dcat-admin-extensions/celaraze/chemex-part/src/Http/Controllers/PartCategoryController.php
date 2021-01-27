<?php

namespace Celaraze\Chemex\Part\Http\Controllers;

use App\Models\DepreciationRule;
use Celaraze\Chemex\Part\Actions\Tree\ToolAction\PartCategoryImportAction;
use Celaraze\Chemex\Part\Repositories\PartCategory;
use Celaraze\Chemex\Part\Support;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Tree;
use Illuminate\Http\Request;

class PartCategoryController extends AdminController
{
    public function __construct()
    {
        $this->title = Support::trans('part-category.title');
    }

    public function selectList(Request $request)
    {
        $q = $request->get('q');
        return \Celaraze\Chemex\Part\Models\PartCategory::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
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
        return new Tree(new \Celaraze\Chemex\Part\Models\PartCategory(), function (Tree $tree) {
            $tree->tools(function (Tree\Tools $tools) {
                $tools->add(new PartCategoryImportAction());
            });
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        return Grid::make(new PartCategory(['parent', 'depreciation']), function (Grid $grid) {
            $grid->column('id');
            $grid->column('name', Support::trans('part-category.name'));
            $grid->column('description', Support::trans('part-category.description'));
            $grid->column('parent.name', Support::trans('part-category.parent.name'));
            $grid->column('depreciation.name', Support::trans('part-category.name'));

            $grid->enableDialogCreate();

            $grid->toolsWithOutline(false);

            $grid->quickSearch('id', 'name', 'description')
                ->placeholder('试着搜索一下')
                ->auto(false);
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
        return Show::make($id, new PartCategory(['parent', 'depreciation']), function (Show $show) {
            $show->field('id');
            $show->field('name', Support::trans('part-category.name'));
            $show->field('description', Support::trans('part-category.description'));
            $show->field('parent.name', Support::trans('part-category.parent.name'));
            $show->field('depreciation.name', Support::trans('part-category.depreciation.name'));
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
        return Form::make(new PartCategory(), function (Form $form) {
            $form->display('id');
            $form->text('name', Support::trans('part-category.name'))->required();
            $form->text('description', Support::trans('part-category.description'));
            $form->select('parent_id', Support::trans('part-category.parent.name'))
                ->options(\Celaraze\Chemex\Part\Models\PartCategory::all()
                    ->pluck('name', 'id'));
            $form->select('depreciation_rule_id', Support::trans('part-category.depreciation.name'))
                ->options(DepreciationRule::all()
                    ->pluck('name', 'id'));
            $form->display('created_at');
            $form->display('updated_at');

            $form->disableCreatingCheck();
            $form->disableEditingCheck();
            $form->disableViewCheck();
        });
    }
}
