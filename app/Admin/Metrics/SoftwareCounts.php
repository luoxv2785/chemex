<?php


namespace App\Admin\Metrics;


use App\Models\SoftwareRecord;
use Closure;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Card;
use Illuminate\Contracts\Support\Renderable;

class SoftwareCounts extends Card
{
    /**
     * @param string|Closure|Renderable|LazyWidget $content
     *
     * @return $this
     */
    public function content($content): SoftwareCounts
    {
        $counts = SoftwareRecord::all()->count();
        $software_counts = admin_trans_label('Software Counts');
        $html = <<<HTML
<div class="small-box" style="margin-bottom: 0;background: rgba(0,150,136,0.7);border-radius: .25rem">
  <div class="inner">
    <h3 class="font-grey">{$counts}</h3>
    <p class="font-grey">{$software_counts}</p>
  </div>
</div>
HTML;

        $this->content = $this->formatRenderable($html);
        $this->noPadding();

        return $this;
    }
}
