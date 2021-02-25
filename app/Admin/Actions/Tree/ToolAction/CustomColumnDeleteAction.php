<?php

namespace App\Admin\Actions\Tree\ToolAction;

use App\Admin\Forms\CustomColumnDeleteForm;
use Dcat\Admin\Tree\RowAction;
use Dcat\Admin\Widgets\Modal;
use Illuminate\Database\Eloquent\Model;

class CustomColumnDeleteAction extends RowAction
{
    protected ?Model $model;

    public function __construct($title = null, Model $model = null)
    {
        parent::__construct($title);
        $this->title = admin_trans_label('Delete');
        $this->model = $model;
    }

    /**
     * 渲染模态框
     * @return Modal|string
     */
    public function render()
    {
        return Modal::make()
            ->lg()
            ->body(new CustomColumnDeleteForm('', '', $this->model))
            ->button("<a class='btn btn-sm btn-danger' style='color: white;'><i class='feather icon-package'></i>&nbsp;$this->title</a>");
    }
}
