<?php


namespace App\Admin\Metrics;


use App\Models\User;
use Closure;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Card;
use Illuminate\Contracts\Support\Renderable;

class UserCounts extends Card
{
    /**
     * @param string|Closure|Renderable|LazyWidget $content
     *
     * @return $this
     */
    public function content($content): UserCounts
    {
        $counts = User::count();
        $user_counts = admin_trans_label('User Counts');
        $html = <<<HTML
<div class="small-box" style="margin-bottom: 0;background: rgba(139,195,74,0.7);border-radius: .25rem">
  <div class="inner">
    <h4 class="font-grey">{$counts}</h4>
    <p class="font-grey">{$user_counts}</p>
  </div>
</div>
HTML;

        $this->content = $this->formatRenderable($html);
        $this->noPadding();

        return $this;
    }
}
