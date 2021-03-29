<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Services\VersionService;
use App\Support\Version;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;
use Illuminate\Http\JsonResponse;
use Pour\Base\Uni;

class VersionController extends Controller
{
    /**
     * 页面.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function index(Content $content): Content
    {
        $version = config('admin.chemex_version');
        $description = Version::list()['geisha'];

        return $content
            ->title($this->title())
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) use ($version, $description) {
                $row->column(3, function (Column $column) use ($version) {
                    $column->row(new Card(view('version.upgrade')));
                    $column->row(new Card(admin_trans_label('Current Version'), $version));
                });
                $row->column(9, function (Column $column) use ($description) {
                    $column->row(new Card($description['name'], $description['description']));
                });
            });
    }

    public function title()
    {
        return admin_trans_label('title');
    }

    /**
     * 版本升级.
     *
     * @return array|JsonResponse
     */
    public function upgrade()
    {
        $result = VersionService::upgrade();
        return Uni::returnJson(200, '更新成功！', $result);
    }
}
