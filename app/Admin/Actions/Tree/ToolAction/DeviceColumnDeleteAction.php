<?php

namespace App\Admin\Actions\Tree\ToolAction;

use App\Admin\Forms\DeviceColumnDeleteForm;
use Dcat\Admin\Tree\RowAction;
use Dcat\Admin\Widgets\Modal;

class DeviceColumnDeleteAction extends RowAction
{
    public function __construct($title = null)
    {
        parent::__construct($title);
        $this->title = admin_trans_label('Delete');
    }

    /**
     * 渲染模态框
     * @return Modal|string
     */
    public function render()
    {
        return Modal::make()
            ->lg()
            ->body(new DeviceColumnDeleteForm())
            ->button("<a class='btn btn-sm btn-danger' style='color: white;'><i class='feather icon-package'></i>&nbsp;$this->title</a>");
    }
}
