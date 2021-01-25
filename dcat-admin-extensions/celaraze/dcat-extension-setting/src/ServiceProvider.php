<?php

namespace Celaraze\DcatSetting;

use Dcat\Admin\Extend\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    protected $js = [
        'js/index.js',
    ];
    protected $css = [
        'css/index.css',
    ];
    protected $menu = [
        [
            'title' => '站点配置',
            'uri' => 'settings/site',
            'icon' => 'feather icon-settings'
        ]
    ];

    public function register()
    {

    }

    public function init()
    {
        parent::init();
    }
}
