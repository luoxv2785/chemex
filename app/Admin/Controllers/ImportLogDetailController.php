<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ImportLogDetail;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ImportLogDetailController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ImportLogDetail(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('log_id');
            $grid->column('status');
            $grid->column('log');
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
        return Show::make($id, new ImportLogDetail(), function (Show $show) {
            $show->field('id');
            $show->field('log_id');
            $show->field('status');
            $show->field('log');
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
        return Form::make(new ImportLogDetail(), function (Form $form) {
            $form->display('id');
            $form->text('log_id');
            $form->text('status');
            $form->text('log');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
