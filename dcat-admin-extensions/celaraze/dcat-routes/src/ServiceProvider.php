<?php

namespace Celaraze\DcatRoutes;

use Celaraze\DcatRoutes\Http\Middleware\MiddleInject;
use Dcat\Admin\Extend\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 * @package Celaraze\DcatRoutes
 */
class ServiceProvider extends BaseServiceProvider
{
    protected $js = [
        'js/index.js',
    ];
    protected $css = [
        'css/index.css',
    ];
    protected $middleware = [
        'before' => [

        ],
        'middle' => [
            MiddleInject::class,
        ],
        'after' => [

        ]
    ];

    public function register()
    {
        //
    }

    public function settingForm(): Setting
    {
        return new Setting($this);
    }

    public function init()
    {
        parent::init();

    }
}
