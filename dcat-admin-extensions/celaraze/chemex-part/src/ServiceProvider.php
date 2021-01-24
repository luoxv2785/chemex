<?php

namespace Celaraze\Chemex\Part;

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
            'title' => '配件管理',
            'uri' => '',
            'icon' => 'feather icon-server'
        ],
        [
            'parent' => '配件管理',
            'title' => '配件',
            'uri' => 'part/records',
            'icon' => ''
        ],
        [
            'parent' => '配件管理',
            'title' => '配件分类',
            'uri' => 'part/categories',
            'icon' => ''
        ],
        [
            'parent' => '配件管理',
            'title' => '配件归属记录',
            'uri' => 'part/tracks',
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
