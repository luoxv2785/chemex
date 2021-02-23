<?php

namespace Celaraze\DcatPlus\Forms;

use Celaraze\DcatPlus\Support;
use Dcat\Admin\Widgets\Form;

class DcatPlusUIForm extends Form
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
            ->success(Support::trans('main.success'))
            ->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->switch('header_padding_fix', Support::trans('main.header_padding_fix'))
            ->default(admin_setting('header_padding_fix'));
        $this->radio('theme_color', Support::trans('main.theme_color'))
            ->options([
                'default' => Support::trans('main.black_blue'),
                'blue' => Support::trans('main.blue'),
                'blue-light' => Support::trans('main.light_blue'),
                'green' => Support::trans('main.black_green')
            ])
            ->default(admin_setting('theme_color'));
        $this->radio('sidebar_style', Support::trans('main.sidebar_style'))
            ->options([
                'default' => Support::trans('main.default'),
                'sidebar-separate' => Support::trans('main.separate'),
                'horizontal_menu' => Support::trans('main.horizontal_menu')
            ])
            ->default(admin_setting('sidebar_style'));
        $this->switch('grid_row_actions_right', Support::trans('main.grid_row_actions_right'))
            ->help(Support::trans('main.grid_row_actions_right_help'))
            ->default(admin_setting('grid_row_actions_right'));
        $this->switch(Support::trans('main.switch_to_select_create'))
            ->default(admin_setting('switch_to_select_create'));
    }
}
