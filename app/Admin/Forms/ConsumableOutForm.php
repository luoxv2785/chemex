<?php

namespace App\Admin\Forms;

use App\Models\ConsumableRecord;
use App\Models\ConsumableTrack;
use App\Models\User;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Exception;

class ConsumableOutForm extends Form implements LazyRenderable
{
    use LazyWidget;

    /**
     * 处理表单提交逻辑
     * @param array $input
     * @return JsonResponse
     */
    public function handle(array $input): JsonResponse
    {
        $consumable_record_id = $input['consumable_id'] ?? null;
        $number = $input['number'] ?? null;
        $user_id = $input['user_id'] ?? null;
        if (empty($consumable_record_id) || empty($number) || empty($user_id)) {
            return $this->response()
                ->error(trans('main.parameter_missing'));
        }
        try {
            $consumable_track = ConsumableTrack::where('consumable_id', $consumable_record_id)->first();
            if (empty($consumable_track)) {
                return $this->response()
                    ->error(admin_trans_label('Track None'));
            } else {
                $new_consumable_track = $consumable_track->replicate();
                $new_consumable_track->number -= $number;
                $new_consumable_track->change = $number;
                $new_consumable_track->user_id = $user_id;
                $new_consumable_track->save();
                $consumable_track->delete();
            }
            $return = $this->response()
                ->success(trans('main.success'))
                ->refresh();
        } catch (Exception $e) {
            $return = $this
                ->response()
                ->error(trans('main.fail') . $e->getMessage());
        }

        return $return;
    }

    /**
     * 构造表单
     */
    public function form()
    {
        $this->select('consumable_id')
            ->options(ConsumableRecord::pluck('name', 'id'))
            ->required();
        $this->currency('number')
            ->symbol('')
            ->required();
        $this->select('user_id')
            ->options(User::pluck('name', 'id'))
            ->required();
    }
}
