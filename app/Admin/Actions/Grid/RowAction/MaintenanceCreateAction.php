<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Admin\Forms\MaintenanceCreateForm;
use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;

class MaintenanceCreateAction extends RowAction
{
    protected $item = null;

    public function __construct($item)
    {
        parent::__construct();
        $this->title = '🔧 ' . admin_trans_label('Maintenance Create');
        $this->item = $item;
    }

    /**
     * 渲染模态框
     * @return Modal|string
     */
    public function render()
    {
        $form = MaintenanceCreateForm::make()->payload([
            'item' => $this->item,
            'item_id' => $this->getKey()
        ]);

        return Modal::make()
            ->lg()
            ->title(admin_trans_label('Maintenance Create'))
            ->body($form)
            ->button($this->title);
    }
}
