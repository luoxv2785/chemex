<?php

namespace Celaraze\Chemex\Software;

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
            'title' => '软件管理',
            'uri' => '',
            'icon' => 'feather icon-disc'
        ],
        [
            'parent' => '软件管理',
            'title' => '软件',
            'uri' => 'software/records',
            'icon' => ''
        ],
        [
            'parent' => '软件管理',
            'title' => '软件分类',
            'uri' => 'software/categories',
            'icon' => ''
        ],
        [
            'parent' => '软件管理',
            'title' => '软件归属记录',
            'uri' => 'software/tracks',
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
