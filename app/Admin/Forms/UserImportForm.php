<?php

namespace App\Admin\Forms;

use App\Models\Department;
use App\Models\User;
use App\Services\LDAPService;
use Box\Spout\Common\Exception\IOException;
use Box\Spout\Common\Exception\UnsupportedTypeException;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Widgets\Form;
use Dcat\EasyExcel\Excel;
use Exception;
use League\Flysystem\FileNotFoundException;


class UserImportForm extends Form
{
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
                        if (!empty($row['用户名']) && !empty($row['名称']) && !empty($row['部门']) && !empty($row['性别']) && !empty($row['密码'])) {
                            $department = Department::where('name', $row['部门'])->first();
                            if (empty($department)) {
                                $department = new Department();
                                $department->name = $row['部门'];
                                $department->save();
                            }
                            $user = new User();
                            $user->username = $row['用户名'];
                            $user->name = $row['名称'];
                            $user->department_id = $department->id;
                            $user->gender = $row['性别'];
                            $user->password = $row['密码'];
                            if (!empty($row['职位'])) {
                                $user->title = $row['职位'];
                            }
                            if (!empty($row['手机'])) {
                                $user->mobile = $row['手机'];
                            }
                            if (!empty($row['邮箱'])) {
                                $user->email = $row['邮箱'];
                            }
                            $user->save();
                        } else {
                            return $this->response()
                                ->error(trans('main.parameter_missing'));
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
            $result = LDAPService::importUsers($input['mode']);
            if ($result) {
                return $this->response()
                    ->success(trans('main.success'))
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
                $form->file('file')
                    ->help(admin_trans_label('File Help'))
                    ->accept('xls,xlsx,csv')
                    ->autoUpload()
                    ->uniqueName();
            })
            ->when('ldap', function (Form $form) {
                $form->radio('mode')
                    ->options(['rewrite' => admin_trans_label('Rewrite'), 'merge' => admin_trans_label('Merge')])
                    ->required()
                    ->default('merge');
            })
            ->options(['file' => admin_trans_label('File'), 'ldap' => admin_trans_label('LDAP')])
            ->required()
            ->default('file');
    }
}
