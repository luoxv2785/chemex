<?php


namespace App\Admin\Metrics;


use App\Models\PartRecord;
use Closure;
use Dcat\Admin\Grid\LazyRenderable as LazyGrid;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Card;
use Illuminate\Contracts\Support\Renderable;

class PartCounts extends Card
{
    /**
     * @param string|Closure|Renderable|LazyWidget $content
     *
     * @return $this
     */
    public function content($content): PartCounts
    {
        if ($content instanceof LazyGrid) {
            $content->simple();
        }
        $counts = PartRecord::count();
        $part_counts = admin_trans_label('Part Counts');
        $html = <<<HTML
<div class="small-box" style="margin-bottom: 0;background: rgba(33,150,243,0.7);border-radius: .25rem">
  <div class="inner">
    <h4 class="font-grey">{$counts}</h4>
    <p class="font-grey">{$part_counts}</p>
  </div>
</div>
HTML;

        $this->content = $this->formatRenderable($html);
        $this->noPadding();

        return $this;
    }
}
