<?php

namespace Celaraze\DcatPlus\Http\Controllers;

use Celaraze\DcatPlus\Forms\DcatPlusUIForm;
use Celaraze\DcatPlus\Support;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Routing\Controller;

class DcatPlusUIController extends Controller
{
    public function index(Content $content): Content
    {
        return $content
            ->title(Support::trans('main.title'))
            ->description(Support::trans('main.description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink(Support::trans('main.common'), admin_route('dcat-plus.site.index'));
                $tab->add(Support::trans('main.ui'), new Card(new DcatPlusUIForm()), true);
                $row->column(12, $tab);
            });
    }
}
