<?php

namespace App\Admin\Controllers;

use App\Admin\Forms\ConfigurationPlatformForm;
use App\Http\Controllers\Controller;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Card;

class ConfigurationPlatformController extends Controller
{
    /**
     * 页面
     * @param Content $content
     * @return Content
     */
    public function index(Content $content): Content
    {
        return $content
            ->header('平台配置')
            ->description('用户可自定义平台的配置')
            ->body(new Card(new ConfigurationPlatformForm()));
    }
}
