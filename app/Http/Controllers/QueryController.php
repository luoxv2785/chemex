<?php

namespace App\Http\Controllers;

use App\Models\DeviceRecord;
use App\Models\PartRecord;
use App\Models\SoftwareRecord;
use Celaraze\Response;
use Illuminate\Http\JsonResponse;
use JetBrains\PhpStorm\ArrayShape;

class QueryController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * 查询资产.
     *
     * @param $asset_number
     * @return JsonResponse|array
     */
    #[ArrayShape(['code' => "int", 'message' => "string", "data" => "mixed"])]
    public function handle($asset_number): JsonResponse|array
    {
        $asset = DeviceRecord::where('asset_number', $asset_number)->first();
        if (empty($asset)) {
            $asset = PartRecord::where('asset_number', $asset_number)->first();
            if (empty($asset)) {
                $asset = SoftwareRecord::where('asset_number', $asset_number)->first();
                if (empty($asset)) {
                    return Response::make(404, '没有查询到对应资产');
                } else {
                    return Response::make(200, '查询成功', [$asset]);
                }
            } else {
                return Response::make(200, '查询成功', [$asset]);
            }
        } else {
            return Response::make(200, '查询成功', [$asset]);
        }
    }
}
