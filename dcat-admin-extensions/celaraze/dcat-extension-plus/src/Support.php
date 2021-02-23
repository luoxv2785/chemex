<?php


namespace Celaraze\DcatPlus;


use Celaraze\DcatPlus\Extensions\Form\SelectCreate;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;

class Support
{
    /**
     * 快速翻译（为了缩短代码量）
     * @param $string
     * @return array|string|null
     */
    public static function trans($string)
    {
        return ServiceProvider::trans($string);
    }

    /**
     * 初始化配置注入
     */
    public function initConfig()
    {
        /**
         * 处理站点LOGO自定义
         */
        if (empty(admin_setting('site_logo'))) {
            $logo = admin_setting('site_logo_text');
        } else {
            $logo = config('app.url') . '/uploads/' . admin_setting('site_logo');
            $logo = "<img src='$logo'>";
        }

        /**
         * 处理站点LOGO-MINI自定义
         */
        if (empty(admin_setting('site_logo_mini'))) {
            $logo_mini = admin_setting('site_logo_text');
        } else {
            $logo_mini = config('app.url') . '/uploads/' . admin_setting('site_logo_mini');
            $logo_mini = "<img src='$logo_mini'>";
        }

        /**
         * 处理站点名称
         */
        $horizontal_menu = false;
        if (empty(admin_setting('site_url'))) {
            $site_url = 'http://localhost';
        } else {
            $site_url = admin_setting('site_url');
        }

        if (empty(admin_setting('site_debug'))) {
            $site_debug = true;
        } else {
            $site_debug = admin_setting('site_debug');
        }

        if (empty(admin_setting('theme_color'))) {
            $theme_color = 'blue-light';
        } else {
            $theme_color = admin_setting('theme_color');
        }
        if (empty(admin_setting('sidebar_style'))) {
            $sidebar_style = 'default';
        } else {
            $sidebar_style = admin_setting('sidebar_style');
            if ($sidebar_style == 'horizontal_menu') {
                $horizontal_menu = true;
            }
        }

        /**
         * 复写admin站点配置
         */
        config([
            'app.url' => $site_url,
            'app.debug' => $site_debug,
            'app.locale' => admin_setting('site_lang'),
            'app.fallback_locale' => admin_setting('site_lang'),

            'admin.title' => admin_setting('site_title'),
            'admin.logo' => $logo,
            'admin.logo-mini' => $logo_mini,
            'admin.layout.color' => $theme_color,
            'admin.layout.body_class' => $sidebar_style,
            'admin.layout.horizontal_menu' => $horizontal_menu
        ]);
    }

    /**
     * 扩展自定义字段
     */
    public function injectFields()
    {
        Form::extend('selectCreate', SelectCreate::class);
    }

    /**
     * 移除底部授权
     */
    public function footerRemove()
    {
        Admin::style(
            <<<CSS
.main-footer {
    display: none;
}
CSS
        );
    }

    /**
     * 优化顶部菜单边距
     */
    public function headerPaddingFix()
    {
        if (admin_setting('header_padding_fix')) {
            Admin::style(
                <<<CSS
.navbar{
    margin: 0 35px !important;
}

.main-horizontal-sidebar{
    box-sizing: border-box !important;
    padding: 0 35px !important;
    background-color: transparent !important;
}

.nav-link {
    padding: 0;
}

.empty-data {
    text-align: center;
    color: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: left;
}

.font-grey {
    color: white;
}

CSS
            );
        }
    }

    /**
     * 表格行操作按钮最右
     */
    public function gridRowActionsRight()
    {
        if (admin_setting('grid_row_actions_right')) {
            Admin::style(
                <<<CSS
.grid__actions__{
    width: 20%;
    text-align: right;
}
CSS

            );
        }
    }
}
