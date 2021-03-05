<?php

namespace App\Admin\Forms;

use App\Models\Department;
use App\Services\LDAPService;
use Box\Spout\Common\Exception\IOException;
use Box\Spout\Common\Exception\UnsupportedTypeException;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Dcat\EasyExcel\Excel;
use Exception;
use League\Flysystem\FileNotFoundException;

class DepartmentImportForm extends Form implements LazyRenderable
{
    use LazyWidget;

    /**
     * 处理表单提交逻辑
     * @param array $input
     * @return JsonResponse
     */
    public function handle(array $input): JsonResponse
    {
        if ($input['type'] == 'file') {
            $file = $input['file'];
            $file_path = public_path('uploads/' . $file);
            try {
                $rows = Excel::import($file_path)->first()->toArray();
                foreach ($rows as $row) {
                    try {
                        if (!empty($row['名称'])) {
                            $department = new Department();
                            $department->name = $row['名称'];
                            if (!empty($row['描述'])) {
                                $department->description = $row['描述'];
                            }
                            if (!empty($row['父级部门'])) {
                                $parent_department = Department::where('name', $row['父级部门'])->first();
                                if (empty($parent_department)) {
                                    $parent_department = new Department();
                                    $parent_department->name = $row['父级部门'];
                                    $parent_department->save();
                                }
                                $department->parent_id = $parent_department->id;
                            }
                            $department->save();
                        } else {
                            return $this->response()
                                ->error(trans('admin.parameter_missing'));
                        }
                    } catch (Exception $exception) {
                        return $this->response()->error($exception->getMessage());
                    }
                }
                return $this->response()
                    ->success(trans('main.upload_success'))
                    ->refresh();
            } catch (IOException $e) {
                return $this->response()
                    ->error(trans('main.file_io_error') . $e->getMessage());
            } catch (UnsupportedTypeException $e) {
                return $this->response()
                    ->error(trans('main.file_format') . $e->getMessage());
            } catch (FileNotFoundException $e) {
                return $this->response()
                    ->error(trans('main.file_none') . $e->getMessage());
            }
        }

        if ($input['type'] == 'ldap') {
            $result = LDAPService::importUserDepartments($input['mode']);
            if ($result) {
                return $this->response()
                    ->success(trans('main.ldap_import_success'))
                    ->refresh();
            } else {
                return $this->response()
                    ->error($result);
            }
        }
    }

    /**
     * 构造表单
     */
    public function form()
    {
        $this->select('type')
            ->when('file', function (Form $form) {
                $form->file('file', trans('main.file'))
                    ->help(trans('main.department_import_file_help'))
                    ->accept('xls,xlsx,csv')
                    ->autoUpload()
                    ->uniqueName()
                    ->required();
            })
            ->when('ldap', function (Form $form) {
                $form->radio('mode', trans('main.mode'))
                    ->options(['rewrite' => trans('main.rewrite'), 'merge' => trans('main.merge')])
                    ->required()
                    ->default('merge');
            })
            ->options(['file' => trans('main.file'), 'ldap' => trans('main.ldap')])
            ->required()
            ->default('file');
    }
}
