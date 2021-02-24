<?php


namespace App\Traits;


use App\Grid;
use App\Models\CustomField;
use Dcat\Admin\Form;
use Dcat\Admin\Show;
use Illuminate\Database\Eloquent\Model;

trait HasCustomFields
{
    /**
     * 构建自定义字段Form结构
     * @param Model $model
     * @param Form $form
     * @return Form
     */
    public static function makeForm(Model $model, Form $form): Form
    {
        foreach (self::getCustomFields($model) as $custom_field) {
            switch ($custom_field->type) {
                case 'date':
                    $form->date($custom_field->name, $custom_field->nick_name);
                    break;
                case 'dateTime':
                    $form->datetime($custom_field->name, $custom_field->nick_name);
                    break;
                case 'integer':
                    $form->number($custom_field->name, $custom_field->nick_name);
                    break;
                case 'double':
                case 'float':
                    $form->currency($custom_field->name, $custom_field->nick_name);
                    break;
                case 'longText':
                    $form->textarea($custom_field->name, $custom_field->nick_name);
                    break;
                default:
                    $form->text($custom_field->name, $custom_field->nick_name);
            }
            if ($custom_field->is_nullable == 0) {
                $form->field($custom_field->name)->required();
            }
        }
        return $form;
    }

    /**
     * 获取自定义字段
     * @param Model $model
     * @return mixed
     */
    public static function getCustomFields(Model $model)
    {
        return CustomField::where('table_name', $model->getTable())->get();
    }

    /**
     * 构建自定义字段Detail结构
     * @param Model $model
     * @param Show $show
     * @return Show
     */
    public static function makeDetail(Model $model, Show $show): Show
    {
        foreach (self::getCustomFields($model) as $custom_field) {
            $show->field($custom_field->name, $custom_field->nick_name);
        }
        return $show;
    }

    /**
     * 构建自定义字段Grid结构
     * @param Model $model
     * @param Grid $grid
     * @param $column_sorts
     * @return Grid
     */
    public static function makeGrid(Model $model, Grid $grid, $column_sorts): Grid
    {
        foreach (self::getCustomFields($model) as $custom_field) {
            $grid->column($custom_field->name, $custom_field->nick_name, $column_sorts);
        }
        return $grid;
    }

    /**
     * 构建自定义字段QuickSearch结构
     * @param Model $model
     * @return array
     */
    public static function makeQuickSearch(Model $model): array
    {
        $keys = [];
        foreach (self::getCustomFields($model) as $custom_field) {
            array_push($keys, $custom_field->name);
        }
        return $keys;
    }

    /**
     * 构建自定义字段Filter结构
     * @param Model $model
     * @param $filter
     */
    public static function makeFilter(Model $model, $filter)
    {
        foreach (self::getCustomFields($model) as $custom_field) {
            $filter->equal($custom_field->name, $custom_field->nick_name);
        }
    }
}
