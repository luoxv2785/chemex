<?php

namespace Celaraze\DcatSetting\Http\Controllers;

use Celaraze\DcatSetting\Forms\DcatSettingForm;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Card;
use Illuminate\Routing\Controller;

class DcatSettingController extends Controller
{
    public function index(Content $content): Content
    {
        return $content
            ->header('站点配置')
            ->description('提供了一些对站点个性化的配置')
            ->body(new Card(new DcatSettingForm()));
    }
}
