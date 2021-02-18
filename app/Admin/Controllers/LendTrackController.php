<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\CheckTrack;
use App\Support\Data;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Alert;
use Dcat\Admin\Widgets\Tab;


/**
 * @property int status
 * @property int check_id
 */
class LendTrackController extends AdminController
{
    public function index(Content $content): Content
    {
        switch (request('type')) {
            case 'part':
                $title = trans('main.part');
                break;
            default:
                $title = trans('main.device');
        }
        return $content
            ->title($title)
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink(Data::icon('record') . trans('main.record'), admin_route('device.records.index'));
                $tab->addLink(Data::icon('category') . trans('main.category'), admin_route('device.categories.index'));
                $tab->addLink(Data::icon('track') . trans('main.track'), admin_route('device.tracks.index'));
                $tab->add(Data::icon('lend') . trans('main.lend'), $this->grid(), true);
                $tab->addLink(Data::icon('statistics') . trans('main.statistics'), admin_route('device.statistics'));
                $row->column(12, $tab);
            });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        return Grid::make(new CheckTrack(['checker']), function (Grid $grid) {
            $grid->column('id');
            $grid->column('item_type');
            $grid->column('item_id');
            $grid->column('lend_time');
            $grid->column('lend_description');
            $grid->column('user_id');
            $grid->column('plan_return_time');
            $grid->column('return_time');
            $grid->column('return_description');

            $grid->disableRowSelector();
            $grid->disableBatchActions();
            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->disableViewButton();
            $grid->disableDeleteButton();

//            $grid->actions(function (RowActions $actions) {
//                if (Admin::user()->can('check.track.update') && $this->status == 0) {
//                    $actions->append(new CheckTrackUpdateAction());
//                }
//            });
//
//            $grid->toolsWithOutline(false);
//
//            $grid->quickSearch('id', 'check_id', 'checker.name')
//                ->placeholder(trans('main.quick_search'))
//                ->auto(false);
        });
    }

    /**
     * Make a show builder.
     *
     * @return Alert
     */
    protected function detail(): Alert
    {
        return Data::unsupportedOperationWarning();
    }

    /**
     * Make a form builder.
     *
     * @return Alert
     */
    protected function form(): Alert
    {
        return Data::unsupportedOperationWarning();
    }
}
