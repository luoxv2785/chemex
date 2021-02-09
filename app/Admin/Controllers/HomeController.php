<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\AllWorth;
use App\Admin\Metrics\DefectTrend;
use App\Admin\Metrics\DeviceCounts;
use App\Admin\Metrics\DeviceWorth;
use App\Admin\Metrics\ItemWorthTrend;
use App\Admin\Metrics\PartCounts;
use App\Admin\Metrics\PartWorth;
use App\Admin\Metrics\ServiceCounts;
use App\Admin\Metrics\ServiceIssueCounts;
use App\Admin\Metrics\ServiceWorth;
use App\Admin\Metrics\SoftwareCounts;
use App\Admin\Metrics\SoftwareWorth;
use App\Admin\Metrics\StaffCounts;
use App\Admin\Metrics\WorthTrend;
use App\Http\Controllers\Controller;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index(Content $content): Content
    {
        return $content
            ->title(admin_trans_label('Dashboard'))
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->row(function (Row $row) {
                        $row->column(3, function (Column $column) {
//                            $user = AdminUser::where('id', auth('admin')->id())->first();
                            $column->row(new WorthTrend());
                            $column->row(new DefectTrend());
//                            $column->row(new MaintenanceTrend());
//                            $column->row(new IssueTrend());
//                            $notifications = $user->notifications;
//                            $notifications = json_decode($notifications, true);
//                            $column->row(new Card(admin_trans_label('My Todo'), view('todo')
//                                ->with('notifications', $notifications)));
                        });
                        $row->column(9, function (Column $column) {
                            $column->row(function (Row $row) {
                                $row->column(8, new ItemWorthTrend());
//                                $all_days_worth = WorthHeatmap::handle();
//                                $row->column(8, new Card(admin_trans_label('All Days Worth Heatmap Title'), view('apex_charts.all_days_worth_heatmap')
//                                    ->with('worth', $all_days_worth)));
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
                            $column->row(function (Row $row) {
                                $row->column(2, new DeviceCounts());
                                $row->column(2, new PartCounts());
                                $row->column(2, new SoftwareCounts());
                                $row->column(2, new ServiceCounts());
                                $row->column(2, new ServiceIssueCounts());
                                $row->column(2, new StaffCounts());
                            });
                        });
                    });
                });
            });
    }
}
