<?php

namespace Celaraze\Chemex\Consumable;

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
            'title' => 'Consumable Management',
            'uri' => '',
            'icon' => 'feather icon-codepen'
        ],
        [
            'parent' => 'Consumable Management',
            'title' => 'Consumable Records',
            'uri' => 'consumable/records',
            'icon' => ''
        ],
        [
            'parent' => 'Consumable Management',
            'title' => 'Consumable Categories',
            'uri' => 'consumable/categories',
            'icon' => ''
        ],
        [
            'parent' => 'Consumable Management',
            'title' => 'Consumable Tracks',
            'uri' => 'consumable/tracks',
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
