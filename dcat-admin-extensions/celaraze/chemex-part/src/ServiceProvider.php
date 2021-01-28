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
            'title' => 'Part Management',
            'uri' => '',
            'icon' => 'feather icon-server'
        ],
        [
            'parent' => 'Part Management',
            'title' => 'Part Records',
            'uri' => 'part/records',
            'icon' => ''
        ],
        [
            'parent' => 'Part Management',
            'title' => 'Part Categories',
            'uri' => 'part/categories',
            'icon' => ''
        ],
        [
            'parent' => 'Part Management',
            'title' => 'Part Tracks',
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

    }
}
