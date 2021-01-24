<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;

class ConfigurationSiteForm extends Form
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
            ->success('站点配置更新成功！')
            ->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->url('site_url')
            ->help('站点域名决定了静态资源（头像、图片等）的显示路径，可以包含端口号，例如 http://chemex.it:8000 。')
            ->required()
            ->default(admin_setting('site_url'));
        $this->text('site_title')
            ->required()
            ->default(admin_setting('site_title'));
        $this->text('site_logo_text')
            ->help('文本LOGO显示的优先度低于图片，当没有上传图片作为LOGO时，此项将生效。')
            ->required()
            ->default(admin_setting('site_logo_text'));
        $this->image('site_logo')
            ->autoUpload()
            ->uniqueName()
            ->default(admin_setting('site_logo'));
        $this->image('site_logo_mini')
            ->autoUpload()
            ->uniqueName()
            ->default(admin_setting('site_logo_mini'));
    }
}
