<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Models\ServiceRecord;
use App\Models\ServiceTrack;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;

class ServiceRecordDeleteAction extends RowAction
{

    public function __construct($title = null)
    {
        parent::__construct($title);
        $this->title = '🔨 ' . admin_trans_label('Delete');
    }

    /**
     * 处理动作逻辑
     * @return Response
     */
    public function handle(): Response
    {
        if (!Admin::user()->can('service.record.delete')) {
            return $this->response()
                ->error(trans('main.unauthorized'))
                ->refresh();
        }

        $service = ServiceRecord::where('id', $this->getKey())->first();
        if (empty($service)) {
            return $this->response()
                ->error(admin_trans_label('Record None'));
        }

        $service_tracks = ServiceTrack::where('service_id', $service->id)
            ->get();

        foreach ($service_tracks as $service_track) {
            $service_track->delete();
        }

        $service->delete();

        return $this->response()
            ->success(admin_trans_label('Delete Success') . $service->name)
            ->refresh();
    }

    /**
     * 对话框
     * @return string[]
     */
    public function confirm(): array
    {
        return [admin_trans_label('Delete Confirm'), admin_trans_label('Delete Confirm Description')];
    }
}
