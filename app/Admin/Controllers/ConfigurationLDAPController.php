<?php

namespace App\Admin\Controllers;

use Adldap\Auth\BindException;
use Adldap\Auth\PasswordRequiredException;
use Adldap\Auth\UsernameRequiredException;
use App\Admin\Forms\ConfigurationLDAPForm;
use App\Http\Controllers\Controller;
use App\Support\LDAP;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Card;

class ConfigurationLDAPController extends Controller
{
    /**
     * 页面
     * @param Content $content
     * @return Content
     */
    public function index(Content $content): Content
    {
        return $content
            ->header('LDAP配置')
            ->description('提供对LDAP的支持')
            ->body(new Card(new ConfigurationLDAPForm()));
    }

    /**
     * AD登录验证
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
