<?php

namespace Celaraze\Chemex\Consumable\Forms;

use Celaraze\Chemex\Consumable\Models\ConsumableRecord;
use Celaraze\Chemex\Consumable\Models\ConsumableTrack;
use Celaraze\Chemex\Consumable\Support;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Widgets\Form;
use Exception;

class ConsumableInForm extends Form
{
    /**
     * 处理表单提交逻辑
     * @param array $input
     * @return JsonResponse
     */
    public function handle(array $input): JsonResponse
    {
        $consumable_record_id = $input['consumable'] ?? null;
        $number = $input['number'] ?? null;
        $purchased = $input['purchased'] ?? null;
        $expired = $input['expired'] ?? null;
        if (empty($consumable_record_id) || empty($number)) {
            return $this->response()
                ->error(Support::trans('main.required'));
        }
        try {
            $consumable_track = ConsumableTrack::where('consumable_id', $consumable_record_id)->first();
            if (empty($consumable_track)) {
                $consumable_track = new ConsumableTrack();
                $consumable_track->consumable_id = $consumable_record_id;
                $consumable_track->operator = auth('admin')->user()->name;
                $consumable_track->number = $number;
                $consumable_track->change = $number;
                $consumable_track->purchased = $purchased;
                $consumable_track->expired = $expired;
                $consumable_track->save();
            } else {
                $new_consumable_track = $consumable_track->replicate();
                $new_consumable_track->number += $number;
                $new_consumable_track->change = $number;
                $new_consumable_track->operator = auth('admin')->user()->name;
                $new_consumable_track->purchased = $purchased;
                $new_consumable_track->expired = $expired;
                $new_consumable_track->save();
                $consumable_track->delete();
            }
            $return = $this->response()
                ->success(Support::trans('main.success'))
                ->refresh();
        } catch (Exception $e) {
            $return = $this
                ->response()
                ->error(Support::trans('main.error') . $e->getMessage());
        }

        return $return;
    }

    /**
     * 构造表单
     */
    public function form()
    {
        $this->select('consumable', Support::trans('consumable-record.name'))
            ->options(ConsumableRecord::all()
                ->pluck('name', 'id'))
            ->required();
        $this->currency('number', Support::trans('consumable-track.number'))
            ->symbol('')
            ->required();
        $this->date('purchased', Support::trans('consumable-track.purchased'));
        $this->date('expired', Support::trans('consumable-track.expired'));
    }
}
