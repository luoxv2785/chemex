<?php


namespace Celaraze\Chemex\Service;

use Celaraze\Chemex\Service\Models\ServiceIssue;
use Celaraze\Chemex\Service\Models\ServiceRecord;
use Celaraze\Chemex\Service\Models\ServiceTrack;
use Illuminate\Database\Eloquent\Collection;

class Support
{
    /**
     * 获取服务异常总览（看板）
     * @return ServiceRecord[]|Collection
     */
    public static function getServiceIssueStatus()
    {
        $services = ServiceRecord::all();
        foreach ($services as $service) {
            $service_status = $service->status;
            $service->start = null;
            $service->end = null;
            $service_track = ServiceTrack::where('service_id', $service->id)
                ->first();
            if (empty($service_track) || empty($service_track->device)) {
                $service->device_name = '未知';
            } else {
                $service->device_name = $service_track->device->name;
            }
            $issues = [];
            $service_issues = ServiceIssue::where('service_id', $service->id)
                ->get();
            foreach ($service_issues as $service_issue) {
                if (empty($service->start)) {
                    $service->start = $service_issue->start;
                }
                if (strtotime($service_issue->start) < strtotime($service->start)) {
                    $service->start = $service_issue->start;
                }
                // 如果异常待修复
                if ($service_issue->status == 1) {
                    $service->status = 1;
                    $issue = $service_issue->issue . '<br>';
                    array_push($issues, $issue);
                }
                // 如果是修复的
                if ($service_issue->status == 2) {
                    $service->status = 0;
                    $issue = '<span class="status-recovery">[已修复最近一个问题]</span> ' . $service_issue->issue . '<br>';
                    if ((time() - strtotime($service_issue->end)) > (24 * 60 * 60)) {
                        $issue = '';
                        $service->start = '';
                    } else {
                        // 如果结束时间是空，还没修复
                        if (empty($service->end)) {
                            $service->end = $service_issue->end;
                        }
                        // 如果结束时间大于开始时间，修复了
                        if (strtotime($service_issue->end) > strtotime($service->end)) {
                            $service->end = $service_issue->end;
                        }
                    }
                    array_push($issues, $issue);
                }
            }
            // 如果暂停了
            if ($service_status == 1) {
                $service->status = 3;
                $service->start = date('Y-m-d H:i:s', strtotime($service->updated_at));
            }
            $service->issues = $issues;
        }
        $services = json_decode($services, true);
        return $services;
    }
}
