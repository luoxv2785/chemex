<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\DepreciationRule;
use Dcat\Admin\Form;
use Dcat\Admin\Form\NestedForm;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;
use Illuminate\Http\Request;

class DepreciationRuleController extends AdminController
{
    public function selectList(Request $request)
    {
        $q = $request->get('q');

        return \App\Models\DepreciationRule::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        return Grid::make(new DepreciationRule(), function (Grid $grid) {
            $grid->column('id');
            $grid->column('name');
            $grid->column('description');
            $grid->column('termination');

            $grid->toolsWithOutline(false);

            $grid->quickSearch('id', 'name', 'description')
                ->placeholder('试着搜索以下')
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
        return Show::make($id, new DepreciationRule(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('description');
            $show->field('rules')->view('depreciation_rules.rules');
            $show->field('termination');
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
        return Form::make(new DepreciationRule(), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();
            $form->text('description')
                ->help('周期填入最大即可，例如2年代表超过2年，5年代表超过5年，规则会优先从高到低匹配，先判断是否超过5年，如果没有超过则再判断是否超过3年，以此类推。');
            $form->table('rules', function (NestedForm $table) {
                $table->number('number')
                    ->min(0)
                    ->required();
                $table->select('scale')
                    ->options([
                        'day' => '天',
                        'month' => '月',
                        'year' => '年'
                    ])
                    ->required();
                $table->currency('ratio')
                    ->symbol('0.00 ~ 1.00 之间')
                    ->required();
            });
            $form->date('termination')
                ->help('可代表报废时间。');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
