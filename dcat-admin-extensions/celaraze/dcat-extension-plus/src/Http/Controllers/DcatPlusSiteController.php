<?php

namespace Celaraze\DcatPlus\Http\Controllers;

use Celaraze\DcatPlus\Forms\DcatPlusSiteForm;
use Celaraze\DcatPlus\Support;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Routing\Controller;

class DcatPlusSiteController extends Controller
{
    public function index(Content $content): Content
    {
        return $content
            ->title(Support::trans('main.title'))
            ->description(Support::trans('main.description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->add(Support::trans('main.common'), new Card(new DcatPlusSiteForm()), true);
                $tab->addLink(Support::trans('main.ui'), admin_route('dcat-plus.ui.index'));
                $row->column(12, $tab);
            });
    }
}
