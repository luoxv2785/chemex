<?php

namespace Celaraze\DcatPlus\Forms;

use Celaraze\DcatPlus\Support;
use Dcat\Admin\Widgets\Form;

class DcatPlusSiteForm extends Form
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
        $this->url('site_url', Support::trans('main.site_url'))
            ->help(Support::trans('main.site_url_help'))
            ->default(admin_setting('site_url'));
        $this->text('site_title', Support::trans('main.site_title'))
            ->default(admin_setting('site_title'));
        $this->text('site_logo_text', Support::trans('main.site_logo_text'))
            ->help(Support::trans('main.site_logo_text_help'))
            ->default(admin_setting('site_logo_text'));
        $this->image('site_logo', Support::trans('main.site_logo'))
            ->autoUpload()
            ->uniqueName()
            ->default(admin_setting('site_logo'));
        $this->image('site_logo_mini', Support::trans('main.site_logo_mini'))
            ->autoUpload()
            ->uniqueName()
            ->default(admin_setting('site_logo_mini'));
        $this->switch('site_debug', Support::trans('main.site_debug'))
            ->help(Support::trans('main.site_debug_help'))
            ->default(admin_setting('site_debug'));
        $this->radio('site_lang', Support::trans('main.site_lang'))
            ->options([
                'zh_CN' => '中文（简体）',
                'en' => 'English'
            ])
            ->default(admin_setting('site_lang'));
    }
}
