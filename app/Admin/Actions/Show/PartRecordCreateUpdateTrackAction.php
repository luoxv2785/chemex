<?php

namespace App\Admin\Actions\Show;

use App\Admin\Forms\PartRecordCreateUpdateTrackForm;
use Dcat\Admin\Show\AbstractTool;
use Dcat\Admin\Widgets\Modal;

class PartRecordCreateUpdateTrackAction extends AbstractTool
{
    public function __construct()
    {
        parent::__construct();
        $this->title = '💻 ' . admin_trans_label('Track Create Update');
    }

    /**
     * 渲染模态框.
     *
     * @return Modal|string
     */
    public function render()
    {
        $form = PartRecordCreateUpdateTrackForm::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title(admin_trans_label('Track Create Update'))
            ->body($form)
            ->button("<button class='btn btn-sm btn-primary'>$this->title</button>");
    }
}
