<?php

namespace App\Admin\Controllers;

use Adldap\Auth\BindException;
use Adldap\Auth\PasswordRequiredException;
use Adldap\Auth\UsernameRequiredException;
use App\Admin\Forms\SiteLDAPForm;
use App\Support\LDAP;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;

class SiteLDAPController extends AdminController
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
        return $content
            ->title($this->title())
            ->description(admin_trans_label('description'))
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink(trans('main.site_setting'), admin_route('site.setting.index'));
                $tab->addLink(trans('main.site_ui'), admin_route('site.ui.index'));
                $tab->add(trans('main.site_ldap'), new SiteLDAPForm(), true);
                $row->column(12, $tab->withCard());
            });
    }

    public function title()
    {
        return admin_trans_label('title');
    }

    /**
     * AD登录验证
     *
     * @return bool|string
     */
    public function test()
    {
        try {
            if (!admin_setting('ad_enabled')) {
                return -3;
            }

            return LDAP::auth();
        } catch (BindException $e) {
            return $e->getMessage();
        } catch (PasswordRequiredException $e) {
            return -1;
        } catch (UsernameRequiredException $e) {
            return -2;
        }
    }
}
