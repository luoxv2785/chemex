<?php


namespace App\Admin\Metrics;


use App\Models\ServiceIssue;
use App\Models\ServiceRecord;
use Closure;
use Dcat\Admin\Grid\LazyRenderable as LazyGrid;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Card;
use Illuminate\Contracts\Support\Renderable;

class ServiceIssueCounts extends Card
{
    /**
     * @param string|Closure|Renderable|LazyWidget $content
     *
     * @return $this
     */
    public function content($content): ServiceIssueCounts
    {
        if ($content instanceof LazyGrid) {
            $content->simple();
        }
        $counts = 0;
        $services = ServiceRecord::all();
        foreach ($services as $service) {
            $service_issue = ServiceIssue::where('service_id', $service->id)
                ->where('status', 1)
                ->first();
            if (!empty($service_issue)) {
                $counts++;
            }
        }
        $service_issue_counts = admin_trans_label('Service Issue Counts');
        $html = <<<HTML
<div class="small-box" style="margin-bottom: 0;background: rgba(239,83,80,0.7);border-radius: .25rem">
  <div class="inner">
    <h4 class="font-grey">{$counts}</h4>
    <p class="font-grey">{$service_issue_counts}</p>
  </div>
</div>
HTML;

        $this->content = $this->formatRenderable($html);
        $this->noPadding();

        return $this;
    }
}
