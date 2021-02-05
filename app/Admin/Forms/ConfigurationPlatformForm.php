<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;

class ConfigurationPlatformForm extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {
        admin_setting($input);
        return $this
            ->response()
            ->success(admin_trans_label('Configuration Success'))
            ->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->switch('switch_to_select_create')
            ->help(admin_trans_label('Switch To Select Create'))
            ->default(admin_setting('switch_to_select_create'));
    }
}
