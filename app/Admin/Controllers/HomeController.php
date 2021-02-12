<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\AllWorth;
use App\Admin\Metrics\DefectTrend;
use App\Admin\Metrics\DeviceAboutToExpireCounts;
use App\Admin\Metrics\DeviceExpiredCounts;
use App\Admin\Metrics\DeviceWorth;
use App\Admin\Metrics\ItemWorthTrend;
use App\Admin\Metrics\PartAboutToExpireCounts;
use App\Admin\Metrics\PartExpiredCounts;
use App\Admin\Metrics\PartWorth;
use App\Admin\Metrics\ServiceWorth;
use App\Admin\Metrics\SoftwareAboutToExpireCounts;
use App\Admin\Metrics\SoftwareExpiredCounts;
use App\Admin\Metrics\SoftwareWorth;
use App\Admin\Metrics\WorthTrend;
use App\Http\Controllers\Controller;
use Dcat\Admin\Admin;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;

/**
 * Class HomeController
 * @package App\Admin\Controllers
 */
class HomeController extends Controller
{
    public function index(Content $content): Content
    {
        return $content
            ->title(admin_trans_label('title'))
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $row->column(3, new Card('我的资产总值', '3000 元'));
                if (Admin::user()->can('home.dashbaord')) {
                    $row->column(12, '<hr>');
                    $row->column(12, function (Column $column) {
                        $column->row(function (Row $row) {
                            $row->column(3, function (Column $column) {
                                $column->row(new WorthTrend());
                                $column->row(new DefectTrend());
                            });
                            $row->column(9, function (Column $column) {
                                $column->row(function (Row $row) {
                                    $row->column(8, new ItemWorthTrend());
                                    $row->column(4, function (Column $column) {
                                        $column->row(new AllWorth());
                                        $column->row(function (Row $row) {
                                            $row->column(6, new DeviceWorth());
                                            $row->column(6, new PartWorth());
                                        });
                                        $column->row(function (Row $row) {
                                            $row->column(6, new SoftwareWorth());
                                            $row->column(6, new ServiceWorth());
                                        });
                                    });
                                });
                            });
                        });
                    });
                    $row->column(4, new DeviceAboutToExpireCounts());
                    $row->column(4, new PartAboutToExpireCounts());
                    $row->column(4, new SoftwareAboutToExpireCounts());
                    $row->column(4, new DeviceExpiredCounts());
                    $row->column(4, new PartExpiredCounts());
                    $row->column(4, new SoftwareExpiredCounts());
                }
            });
    }
}
