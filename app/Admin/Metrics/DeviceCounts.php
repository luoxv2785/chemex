<?php


namespace App\Admin\Metrics;


use App\Models\DeviceRecord;
use Closure;
use Dcat\Admin\Grid\LazyRenderable as LazyGrid;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Card;
use Illuminate\Contracts\Support\Renderable;

class DeviceCounts extends Card
{
    /**
     * @param string|Closure|Renderable|LazyWidget $content
     *
     * @return $this
     */
    public function content($content): DeviceCounts
    {
        if ($content instanceof LazyGrid) {
            $content->simple();
        }
        $counts = DeviceRecord::count();
        $device_counts = admin_trans_label('Device Counts');
        $html = <<<HTML
<div class="small-box" style="margin-bottom: 0;background: rgba(103,58,183,0.7);border-radius: .25rem">
  <div class="inner">
    <h4 class="font-grey">{$counts}</h4>
    <p class="font-grey">{$device_counts}</p>
  </div>
</div>
HTML;

        $this->content = $this->formatRenderable($html);
        $this->noPadding();

        return $this;
    }
}
