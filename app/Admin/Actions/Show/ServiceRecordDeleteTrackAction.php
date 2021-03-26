<?php

namespace App\Admin\Actions\Show;

use App\Models\ServiceTrack;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Show\AbstractTool;
use Illuminate\Http\Request;

class ServiceRecordDeleteTrackAction extends AbstractTool
{
    public function __construct()
    {
        parent::__construct();
        $this->title = '🔗 ' . admin_trans_label('Track Delete');
    }

    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $service_track = ServiceTrack::where('service_id', $this->getKey())->first();

        if (empty($service_track)) {
            return $this->response()
                ->error(trans('main.fail'));
        }

        $service_track->delete();

        return $this->response()
            ->success(trans('main.success'))
            ->refresh();
    }

    /**
     * @return string|array|void
     */
    public function confirm()
    {
        return [admin_trans_label('Track Delete Confirm')];
    }
}
