<?php

namespace Celaraze\Chemex\Software\Http\Controllers;

use App\Support\Info;
use Celaraze\Chemex\Software\Actions\Tree\ToolAction\SoftwareCategoryImportAction;
use Celaraze\Chemex\Software\Repositories\SoftwareCategory;
use Celaraze\Chemex\Software\Support;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Tree;
use Illuminate\Http\Request;

class SoftwareCategoryController extends AdminController
{
    public function __construct()
    {
        $this->title = Support::trans('software-category.title');
    }

    public function selectList(Request $request)
    {
        $q = $request->get('q');
        return \Celaraze\Chemex\Software\Models\SoftwareCategory::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
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
        return new Tree(new \Celaraze\Chemex\Software\Models\SoftwareCategory(), function (Tree $tree) {
            $tree->tools(function (Tree\Tools $tools) {
                $tools->add(new SoftwareCategoryImportAction());
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
        return Grid::make(new SoftwareCategory(['parent']), function (Grid $grid) {
            $grid->column('id');
            $grid->column('name', Support::trans('software-category.name'));
            $grid->column('description', Support::trans('software-category.description'));
            $grid->column('parent.name', Support::trans('software-category.parent.name'));

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
        return Show::make($id, new SoftwareCategory(['parent']), function (Show $show) {
            $show->field('id');
            $show->field('name', Support::trans('software-category.name'));
            $show->field('description', Support::trans('software-category.description'));
            $show->field('parent.name', Support::trans('software-category.parent.name'));
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
        return Form::make(new SoftwareCategory(), function (Form $form) {
            $form->display('id');
            $form->text('name', Support::trans('software-category.name'))->required();
            $form->text('description', Support::trans('software-category.description'));

            if (Info::ifSelectCreate()) {
                $form->selectCreate('parent_id', Support::trans('software-category.parent.name'))
                    ->options(\Celaraze\Chemex\Software\Models\SoftwareCategory::class)
                    ->ajax(route('selection.software.categories'))
                    ->url(route('software.categories.create'));
            } else {
                $form->select('parent_id', Support::trans('software-category.parent.name'))
                    ->options(\Celaraze\Chemex\Software\Models\SoftwareCategory::all()
                        ->pluck('name', 'id'));
            }

            $form->display('created_at');
            $form->display('updated_at');

            $form->disableCreatingCheck();
            $form->disableEditingCheck();
            $form->disableViewCheck();
        });
    }
}
