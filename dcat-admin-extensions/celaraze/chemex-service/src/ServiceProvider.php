<?php

namespace Celaraze\Chemex\Service;

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
            'title' => '服务管理',
            'uri' => '',
            'icon' => 'feather icon-activity'
        ],
        [
            'parent' => '服务管理',
            'title' => '服务',
            'uri' => 'service/records',
            'icon' => ''
        ],
        [
            'parent' => '服务管理',
            'title' => '服务归属记录',
            'uri' => 'service/tracks',
            'icon' => ''
        ],
        [
            'parent' => '服务管理',
            'title' => '服务故障',
            'uri' => 'service/issues',
            'icon' => ''
        ]
    ];

    public function register()
    {
        //
    }

    public function init()
    {
        parent::init();

        //

    }
}
