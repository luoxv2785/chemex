<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ApprovalTrack;
use App\Models\ApprovalRecord;
use App\Models\Role;
use App\Support\Data;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Tab;

/**
 * @property int item_id
 * @property string item
 * @property int status
 */
class ApprovalTrackController extends AdminController
{
    /**
     * Index interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink(Data::icon('record') . trans('main.approval_record'), admin_route('approval.records.index'));
                $tab->add(Data::icon('track') . trans('main.approval_track'), $this->grid(), true);
                $row->column(12, $tab);
            });
    }

    public function title()
    {
        return admin_trans_label('title');
    }

    public function grid(): Grid
    {
        return Grid::make(new ApprovalTrack(['role']), function (Grid $grid) {
            $grid->model()->orderBy('order', 'ASC');
            
            $grid->column('id');
            $grid->column('order')->orderable();
            $grid->column('name');
            $grid->column('role.name')->label();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                $filter->equal('approval_id')
                    ->select(ApprovalRecord::pluck('name', 'id'));
            });

            $grid->toolsWithOutline(false);
            $grid->disableEditButton();
            $grid->showQuickEditButton();
        });
    }

    public function detail($id): Show
    {
        return Show::make($id, new ApprovalTrack(['role']), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('order');
            $show->field('role.name');

            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * 表单.
     * @return Form
     */
    protected function form(): Form
    {
        return Form::make(new ApprovalTrack(), function (Form $form) {
            $form->display('id');
            $form->select('approval_id')
                ->options(ApprovalRecord::pluck('name', 'id'))
                ->required();
            $form->text('name')->required();
            $form->select('role_id')
                ->options(Role::pluck('name', 'id'))
                ->required();
        });
    }
}
