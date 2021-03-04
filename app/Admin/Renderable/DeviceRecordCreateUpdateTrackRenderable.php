<?php


namespace App\Admin\Renderable;


use Dcat\Admin\Support\LazyRenderable;

class DeviceRecordCreateUpdateTrackRenderable extends LazyRenderable
{
    public function render()
    {
        $id = $this->id;
        $is_lend = $this->id_lend;
    }
}
