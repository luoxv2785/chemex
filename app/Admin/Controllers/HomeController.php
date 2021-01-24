<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\AllWorth;
use App\Admin\Metrics\DeviceCounts;
use App\Admin\Metrics\DeviceWorth;
use App\Admin\Metrics\IssueTrend;
use App\Admin\Metrics\MaintenanceTrend;
use App\Admin\Metrics\ServiceCounts;
use App\Admin\Metrics\ServiceIssueCounts;
use App\Admin\Metrics\StaffCounts;
use App\Admin\Metrics\WorthTrend;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Dcat\Admin\Admin;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;

class HomeController extends Controller
{
    public function index(Content $content): Content
    {
        return $content
            ->header('仪表盘')
            ->description('随时掌握你的资源情况')
            ->body(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->row(function (Row $row) {
                        $row->column(3, function (Column $column) {
                            $user = AdminUser::where('id', auth('admin')->id())->first();
                            $notifications = $user->notifications;
                            $notifications = json_decode($notifications, true);
                            $column->row(new Card('我的待办', view('todo')->with('notifications', $notifications)));
                            $column->row(new WorthTrend());
                            $column->row(new MaintenanceTrend());
                            if (Admin::extension()->enabled('celaraze.chemex-service')) {
                                $class = "Celaraze\\Chemex\\Service\\Metrics\\IssueTrend";
                                $column->row(new $class);
                            }
                        });
                        $row->column(9, function (Column $column) {
                            $column->row(function (Row $row) {
                                $row->column(3, new AllWorth());
                                $row->column(3, new DeviceWorth());
                                if (Admin::extension()->enabled('celaraze.chemex-part')) {
                                    $class = "Celaraze\\Chemex\\Part\\Metrics\\PartWorth";
                                    $row->column(3, new $class);
                                }
                                if (Admin::extension()->enabled('celaraze.chemex-software')) {
                                    $class = "Celaraze\\Chemex\\Software\\Metrics\\SoftwareWorth";
                                    $row->column(3, new $class);
                                }
                                $row->column(3, new DeviceCounts());
                                if (Admin::extension()->enabled('celaraze.chemex-part')) {
                                    $class = "Celaraze\\Chemex\\Part\\Metrics\\PartCounts";
                                    $row->column(3, new $class);
                                }
                                if (Admin::extension()->enabled('celaraze.chemex-software')) {
                                    $class = "Celaraze\\Chemex\\Software\\Metrics\\SoftwareCounts";
                                    $row->column(3, new $class);
                                }
                                $row->column(3, new StaffCounts());
                                if (Admin::extension()->enabled('celaraze.chemex-service')) {
                                    $class = "Celaraze\\Chemex\\Service\\Metrics\\ServiceCounts";
                                    $row->column(3, new $class);
                                    $class = "Celaraze\\Chemex\\Service\\Metrics\\ServiceIssueCounts";
                                    $row->column(3, new $class);
                                }
                            });
                            $class = "Celaraze\\Chemex\\Service\\Support";
                            if (Admin::extension()->enabled('celaraze.chemex-service')) {
                                $services = $class::getServiceIssueStatus();
                                $column->row(new Card('服务程序状态', view('services_dashboard')->with('services', $services)));
                            }
                        });
                    });
                });
            });
    }
}
