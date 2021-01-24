<?php


namespace App\Traits;

use App\Support\Data;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid;

trait HasDeviceRelatedGrid
{
    /**
     * 查看某个设备下面的全部关联配件&软件&服务程序，并且返回它们的渲染集合
     * @param $device_id
     * @return array
     */
    public static function hasDeviceRelated($device_id): array
    {
        $result = [];
        // 配件
        if (Admin::extension()->enabled('celaraze.chemex-part')) {
            $class = "Celaraze\\Chemex\\Part\\Repositories\\PartTrack";
            $grid = Grid::make(new $class(['part', 'part.category', 'part.vendor']), function (Grid $grid) use ($device_id) {
                $grid->model()->where('device_id', '=', $device_id);
                $grid->tableCollapse(false);
                $grid->withBorder();

                $grid->column('id');
                $grid->column('part.category.name');
                $grid->column('part.name')->link(function () {
                    if (!empty($this->part)) {
                        return route('part.records.show', $this->part['id']);
                    }
                });
                $grid->column('part.specification');
                $grid->column('part.sn');
                $grid->column('part.vendor.name');

                $grid->disableToolbar();
                $grid->disableBatchActions();
                $grid->disableRowSelector();
                $grid->disableActions();
            });
            $result['part'] = $grid;
        } else {
            $result['part'] = null;
        }

        // 软件
        if (Admin::extension()->enabled('celaraze.chemex-software')) {
            $class = "Celaraze\\Chemex\\Software\\Repositories\\SoftwareTrack";
            $grid = Grid::make(new $class(['software', 'software.category', 'software.vendor']), function (Grid $grid) use ($device_id) {
                $grid->model()->where('device_id', '=', $device_id);
                $grid->tableCollapse(false);
                $grid->withBorder();

                $grid->column('id');
                $grid->column('software.category.name');
                $grid->column('software.name')->link(function () {
                    if (!empty($this->software)) {
                        return route('software.records.show', $this->software['id']);
                    }
                });
                $grid->column('software.version');
                $grid->column('software.distribution')->using(Data::distribution());
                $grid->column('software.vendor.name');

                $grid->disableToolbar();
                $grid->disableBatchActions();
                $grid->disableRowSelector();
                $grid->disableActions();
            });
            $result['software'] = $grid;
        } else {
            $result['part'] = null;
        }

        // 服务
        if (Admin::extension()->enabled('celaraze.chemex-service')) {
            $class = "Celaraze\\Chemex\\Service\\Repositories\\ServiceTrack";
            $grid = Grid::make(new $class(['service']), function (Grid $grid) use ($device_id) {
                $grid->model()->where('device_id', '=', $device_id);
                $grid->tableCollapse(false);
                $grid->withBorder();

                $grid->column('id');
                $grid->column('service.name')->link(function () {
                    if (!empty($this->service)) {
                        return route('service.records.show', $this->service['id']);
                    }
                });

                $grid->disableToolbar();
                $grid->disableBatchActions();
                $grid->disableRowSelector();
                $grid->disableActions();
            });
            $result['service'] = $grid;
        } else {
            $result['service'] = null;
        }

        return $result;
    }
}
