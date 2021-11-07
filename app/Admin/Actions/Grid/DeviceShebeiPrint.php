<?php

namespace App\Admin\Actions\Grid;
use App\Models\DeviceRecord;
use App\Models\DeviceTrack;
use Dcat\Admin\Admin;
use TCPDF;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Grid\BatchAction;
use Dcat\Admin\Traits\HasPermissions;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DeviceShebeiPrint extends BatchAction
{
 /**
  * 
  */
 protected $title = '打印清单';
 /**
  * Handle the action request.
  *
  * @param Request $request
  *
  * 
  */
 public function handle(Request $request)
 {
     $keys = $this->getkey();
     $url = admin_route ("device.shebei.print",["ids"=>implode("-", $keys)]);
     if (count($keys) > 0) {
         return $this->response()->script("window.open('{$url}')");
     }
 }


 /**
  * 
  */
 public function confirm()
 {
     // return ['Confirm?', 'contents'];
 }
 /**
  * @param Model|Authenticatable|HasPermissions|null $user
  *
  *
  */
 protected function authorize($user): bool
 {
     return true;
 }
 /**
  * 
  */
 protected function parameters()
 {
     return [];
 }
 public function actionScript(){
     $warning = "请选择打印的设备！";
     return <<<JS
function (data, target, action) { 
 var key = {$this->getSelectedKeysScript()}
 if (key.length === 0) {
     Dcat.warning('{$warning}');
     return false;
 }
 // 设置主键为复选框选中的行ID数组
 action.options.key = key;
}
JS;
 }
 protected function html()
 {
     return <<<HTML
<a {$this->formatHtmlAttributes()}><button class="btn btn-primary btn-mini">{$this->title()}</button></a>


HTML;
 }
}