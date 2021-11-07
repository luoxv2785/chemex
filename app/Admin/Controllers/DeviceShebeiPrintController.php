<?php

namespace App\Admin\Controllers;

use App\Models\DeviceRecord;
use App\Http\Controllers\Controller;
use App\Support\Data;
use App\Support\Support;
use App\Services\DeviceServicesPrint;
use Illuminate\Http\Request;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Illuminate\Contracts\Translation\Translator;

class DeviceShebeiPrintController extends Controller
{
    /**
     * 页面.
     *
     * @param Content $content
     *
     * @return Content
     */




public function DeviceShebeiprint(Request $request) {
     $ids = $request->input("ids");
     $ids = explode("-", $ids);
     if (count($ids)>0) {
      $data = DeviceRecord::find($ids);

         return view("deviceshebeiprint", ["data"=>$data]);
     }
 }

    public function title(): array|string|Translator|null
    {
        return admin_trans_label('title');
    }
}


