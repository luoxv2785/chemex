<?php

namespace App\Admin\Actions\Tree\ToolAction;

use App\Admin\Forms\CustomColumnDeleteForm;
use Dcat\Admin\Tree\RowAction;
use Dcat\Admin\Widgets\Modal;

class CustomColumnDeleteAction extends RowAction
{
    protected ?string $tableName;

    public function __construct($title = null, $tableName = null)
    {
        $this->title = admin_trans_label('Delete');
        $this->tableName = $tableName;
        parent::__construct($title);
    }

    /**
     * 渲染模态框
     * @return Modal|string
     */
    public function render()
    {
        return Modal::make()
            ->lg()
            ->body(new CustomColumnDeleteForm('', '', $this->tableName))
            ->button("<a class='btn btn-sm btn-danger' style='color: white;'><i class='feather icon-package'></i>&nbsp;$this->title</a>");
    }
}
