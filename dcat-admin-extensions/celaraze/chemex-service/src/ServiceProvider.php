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
            'title' => 'Service Management',
            'uri' => '',
            'icon' => 'feather icon-activity'
        ],
        [
            'parent' => 'Service Management',
            'title' => 'Service Records',
            'uri' => 'service/records',
            'icon' => ''
        ],
        [
            'parent' => 'Service Management',
            'title' => 'Service Tracks',
            'uri' => 'service/tracks',
            'icon' => ''
        ],
        [
            'parent' => 'Service Management',
            'title' => 'Service Issues',
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
