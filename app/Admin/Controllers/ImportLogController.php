<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ImportLog;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ImportLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ImportLog(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('item');
            $grid->column('succeed');
            $grid->column('failed');
            $grid->column('operator');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
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
    protected function detail($id)
    {
        return Show::make($id, new ImportLog(), function (Show $show) {
            $show->field('id');
            $show->field('item');
            $show->field('succeed');
            $show->field('failed');
            $show->field('operator');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new ImportLog(), function (Form $form) {
            $form->display('id');
            $form->text('item');
            $form->text('succeed');
            $form->text('failed');
            $form->text('operator');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
