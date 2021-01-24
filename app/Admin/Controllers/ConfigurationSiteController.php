<?php

namespace App\Admin\Controllers;

use App\Admin\Forms\ConfigurationSiteForm;
use App\Http\Controllers\Controller;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Card;

class ConfigurationSiteController extends Controller
{
    /**
     * 页面
     * @param Content $content
     * @return Content
     */
    public function index(Content $content): Content
    {
        return $content
            ->header('站点配置')
            ->description('提供了一些对站点个性化的配置')
            ->body(new Card(new ConfigurationSiteForm()));
    }
}
