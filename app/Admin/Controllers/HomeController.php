<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\AllWorth;
use App\Admin\Metrics\DeviceCounts;
use App\Admin\Metrics\DeviceWorth;
use App\Admin\Metrics\IssueTrend;
use App\Admin\Metrics\MaintenanceTrend;
use App\Admin\Metrics\PartWorth;
use App\Admin\Metrics\ServiceCounts;
use App\Admin\Metrics\ServiceIssueCounts;
use App\Admin\Metrics\SoftwareCounts;
use App\Admin\Metrics\SoftwareWorth;
use App\Admin\Metrics\StaffCounts;
use App\Admin\Metrics\WorthTrend;
use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Support\Support;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;

class HomeController extends Controller
{
    public function index(Content $content): Content
    {
        return $content
            ->title(admin_trans_label('Dashboard'))
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->row(function (Row $row) {
                        $row->column(3, function (Column $column) {
                            $user = AdminUser::where('id', auth('admin')->id())->first();
                            $notifications = $user->notifications;
                            $notifications = json_decode($notifications, true);
                            $column->row(new Card(admin_trans_label('My Todo'), view('todo')->with('notifications', $notifications)));
                            $column->row(new WorthTrend());
                            $column->row(new MaintenanceTrend());
                            $column->row(new IssueTrend());
                        });
                        $row->column(9, function (Column $column) {
                            $column->row(function (Row $row) {
                                $row->column(3, new AllWorth());
                                $row->column(3, new DeviceWorth());
                                $row->column(3, new PartWorth());
                                $row->column(3, new SoftwareWorth());
                                $row->column(3, new DeviceCounts());
                                $row->column(3, new PartWorth());
                                $row->column(3, new SoftwareCounts());
                                $row->column(3, new StaffCounts());
                                $row->column(3, new ServiceCounts());
                                $row->column(3, new ServiceIssueCounts());
                            });
                            $services = Support::getServiceIssueStatus();
                            $column->row(new Card(admin_trans_label('Service Status'), view('services_dashboard')->with('services', $services)));
                        });
                    });
                });
            });
    }
}
