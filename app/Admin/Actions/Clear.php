<?php

namespace App\Admin\Actions;

use Dcat\Admin\Actions\Action;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Traits\HasPermissions;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Dcat\Admin\Widgets\Modal;
class Clear extends Action
{
    protected $title = '清理缓存';

    public function render()
    {
        $modal = Modal::make()
            ->id('clear') // 导航栏显示弹窗，必须固定ID，随机ID会在刷新后失败
            ->title($this->title())
            ->body(\App\Admin\Actions\Form\Clear::make())
            ->lg()
            ->button(
                <<<HTML
<ul class="nav navbar-nav" style="margin-right: 2rem">
    <li><i class="ficon feather icon-trash-2"></i>{$this->title}</li>
</ul>
HTML
            );

        return $modal->render();
    }
}