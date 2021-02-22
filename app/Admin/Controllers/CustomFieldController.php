<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\RowAction\CustomFieldDeleteAction;
use App\Admin\Grid\Displayers\RowActions;
use App\Admin\Repositories\CustomField;
use App\Support\Data;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Tab;
use Pour\Plus\LaravelAdmin;


class CustomFieldController extends AdminController
{
    public function index(Content $content): Content
    {
        return $content
            ->title($this->title())
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $type = request('type');
                switch ($type) {
                    default:
                        $tab->addLink(Data::icon('record') . trans('main.record'), admin_route('device.records.index'));
                        $tab->addLink(Data::icon('category') . trans('main.category'), admin_route('device.categories.index'));
                        $tab->addLink(Data::icon('track') . trans('main.track'), admin_route('device.tracks.index'));
                        $tab->addLink(Data::icon('statistics') . trans('main.statistics'), admin_route('device.statistics'));
                }
                $tab->add(Data::icon('custom_field') . trans('main.custom_field'), $this->grid(), true);
                $row->column(12, $tab);
            });
    }

    public function title()
    {
        if (empty($this->getType())) {
            return admin_trans_label('title');
        } else {
            return trans('main.' . $this->getType());
        }
    }

    public function getType()
    {
        return request('type');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        return Grid::make(new CustomField(), function (Grid $grid) {
            $grid->column('id');
            $grid->column('table_name');
            $grid->column('name');
            $grid->column('type');
            $grid->column('is_nullable')->using(LaravelAdmin::yesOrNo());

            $grid->toolsWithOutline(false);
            $grid->enableDialogCreate();
            $grid->disableEditButton();
            $grid->disableDeleteButton();

            $grid->actions(function (RowActions $actions) {
                if (Admin::user()->can('device.custom_field.delete')) {
                    $actions->append(new CustomFieldDeleteAction());
                }
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
        return Show::make($id, new CustomField(), function (Show $show) {
            $show->field('id');
            $show->field('table_name');
            $show->field('name');
            $show->field('type');
            $show->field('is_nullable')->using(LaravelAdmin::yesOrNo());

            $show->disableEditButton();
            $show->disableDeleteButton();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        return Form::make(new CustomField(), function (Form $form) {
            $form->display('id');
            $form->text('table_name')->required();
            $form->text('name')
                ->help(admin_trans_label('Name Help'))
                ->required();
            $form->text('nick_name')
                ->help(admin_trans_label('Nick Name Help'))
                ->required();
            $form->select('type')->required()
                ->options(Data::customFieldTypes());
            $form->radio('is_nullable')
                ->options(LaravelAdmin::yesOrNo())
                ->default(0);

            /*
             * 如果直接执行表单自带保存，会报错 There is no active transaction
             * 虽然是可以创建成功，但是页面会提示错误，对用户不友好
             * 因此这里需要自定义保存，来“隐藏”报错
             */
            $form->saving(function (Form $form) {
                $custom_fields = new \App\Models\CustomField();
                $custom_fields->table_name = $form->input('table_name');
                $custom_fields->name = $form->input('name');
                $custom_fields->nick_name = $form->input('nick_name');
                $custom_fields->type = $form->input('type');
                $custom_fields->is_nullable = $form->input('is_nullable');
                $custom_fields->save();
                return $form->response()->location(admin_route('custom_fields.index'));
            });

            $form->disableDeleteButton();
        });
    }
}
