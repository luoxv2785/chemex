<?php

namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;
use App\Models\DeviceRecord;
use Dcat\Admin\Layout\Content;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Http\Request;


class DeviceBiaoqianPrintController extends Controller
{
    /**
     * 页面.
     *
     * @param Content $content
     *
     * @return Content
     */


    public function DeviceBiaoqianprint(Request $request)
    {
        $ids = $request->input("ids");
        $ids = explode("-", $ids);
        if (count($ids) > 0) {
            $data = DeviceRecord::find($ids);
            return view("devicebiaoqianprint", ["data" => $data]);
        }
    }

    public function title(): array|string|Translator|null
    {
        return admin_trans_label('title');
    }
}


