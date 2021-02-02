<?php

namespace Celaraze\Chemex\Todo;

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
            'title' => 'Todo Records',
            'uri' => 'todo/records',
            'icon' => 'feather icon-list'
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
