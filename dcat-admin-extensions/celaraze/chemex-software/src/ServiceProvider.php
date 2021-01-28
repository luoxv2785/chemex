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
            'title' => 'Software Management',
            'uri' => '',
            'icon' => 'feather icon-disc'
        ],
        [
            'parent' => 'Software Management',
            'title' => 'Software',
            'uri' => 'software/records',
            'icon' => ''
        ],
        [
            'parent' => 'Software Management',
            'title' => 'Software Categories',
            'uri' => 'software/categories',
            'icon' => ''
        ],
        [
            'parent' => 'Software Management',
            'title' => 'Software Tracks',
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
