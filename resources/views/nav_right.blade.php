<ul class="nav navbar-nav">
    {{--全局按钮--}}
    <li class="dropdown dropdown-notification nav-item mr-1">
        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown" aria-expanded="true" onclick="checkUpdate()">
            <i class="ficon feather icon-loader"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right shadow-200">
            <li class="scrollable-container media-list ps ps--active-y">
                <a class="media d-flex justify-content-between" href="#">
                    <div class="d-flex align-items-start">
                        <div class="media-left">
                        </div>
                        <div class="media-body">
                            <h6 class="primary media-heading">版本</h6>
                            <small class="notification-text" id="version_text">

                            </small>
                        </div>
                    </div>
                </a>
            </li>
            <li class="scrollable-container media-list ps ps--active-y">
                <a class="media d-flex justify-content-between" href="#" onclick="clearCache()">
                    <div class="d-flex align-items-start">
                        <div class="media-left">
                        </div>
                        <div class="media-body">
                            <h6 class="primary media-heading">刷新缓存</h6>
                            <small class="notification-text">
                                如果遇到了一些无法捉摸的问题，可以试试我。
                            </small>
                        </div>
                    </div>
                </a>
            </li>
            <li class="scrollable-container media-list ps ps--active-y">
                <a class="media d-flex justify-content-between" href="#" onclick="migrate()">
                    <div class="d-flex align-items-start">
                        <div class="media-left">
                        </div>
                        <div class="media-body">
                            <h6 class="primary media-heading">更新数据库结构</h6>
                            <small class="notification-text">
                                在每次升级完成后，如果忘记了数据库结构的更新动作，我会帮助你。
                            </small>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </li>

    {{--帮助信息--}}
    <li class="dropdown dropdown-notification nav-item mr-1">
        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown" aria-expanded="true">
            <i class="ficon feather icon-help-circle"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right shadow-200">
            <li class="scrollable-container media-list ps ps--active-y">
                <a class="media d-flex justify-content-between" href="https://gitee.com/celaraze/Chemex/issues"
                   target="_blank">
                    <div class="d-flex align-items-start">
                        <div class="media-left">
                        </div>
                        <div class="media-body">
                            <h6 class="primary media-heading">上报错误</h6>
                            <small class="notification-text">
                                当在使用过程中遇到了一些BUG或是错误问题，请务必告诉我。
                            </small>
                        </div>
                    </div>
                </a>
            </li>
            <li class="scrollable-container media-list ps ps--active-y">
                <a class="media d-flex justify-content-between" href="https://gitee.com/celaraze/Chemex/wikis/pages"
                   target="_blank">
                    <div class="d-flex align-items-start">
                        <div class="media-left">
                        </div>
                        <div class="media-body">
                            <h6 class="primary media-heading">官方文档</h6>
                            <small class="notification-text">
                                在这里你能够找到针对使用过程的一些说明文档。
                            </small>
                        </div>
                    </div>
                </a>
            </li>
            <li class="scrollable-container media-list ps ps--active-y" style="max-height: none;">
                <a class="media d-flex justify-content-between">
                    <div class="d-flex align-items-start">
                        <div class="media-left">
                        </div>
                        <div class="media-body">
                            <h6 class="primary media-heading">微信群</h6>
                            <small class="notification-text">
                                如果你想和其他咖啡壶用户交流，可以扫描以下微信二维码，备注 Chemex 用户，我会第一时间将你拉入用户群。
                            </small>
                            <div class="mt-1">
                                <img src="https://chemex.celaraze.com/wechat.jpg" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </li>

    {{--通知--}}
    <li class="dropdown dropdown-notification nav-item mr-1" style="text-align: center">
        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown" aria-expanded="true">
            <i class="ficon feather icon-bell"></i>
            @if(count($notifications)>0)
                <span class="badge badge-pill badge-primary badge-up">
                {{count($notifications)}}
                </span>
            @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right shadow-200">
            <li class="dropdown-menu-header">
                <div class="dropdown-header m-0 p-2">
                    <h3 class="white">{{count($notifications)}}</h3>
                    <span class="grey darken-2">全部通知数量</span>
                </div>
            </li>
            @if(count($notifications)>0)
                <li class="scrollable-container media-list ps ps--active-y">
                    @foreach($notifications as $notification)
                        <a class="media d-flex justify-content-between"
                           href="{{admin_route('notification.read',[$notification['id']])}}">
                            <div class="d-flex align-items-start">
                                <div class="media-left">
                                </div>
                                <div class="media-body">
                                    <h6 class="primary media-heading">{{trans('main.'.$notification['data']['title'])}}</h6>
                                    <small class="notification-text">
                                        {{trans('main.'.$notification['data']['content'])}}
                                    </small>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </li>
                <li class="dropdown-menu-footer">
                    <a class="dropdown-item p-1 text-center" href="{{admin_route('notification.read.all')}}">全部已读</a>
                </li>
            @endif
        </ul>
    </li>
</ul>

<script>
    function checkUpdate() {
        let html = document.getElementById('version_text');
        html.innerHTML = '正在检查新版本...';
        $.ajax({
            url: "/version/remote",
            success: function (res) {
                if (res !== '') {
                    console.log(res);
                    html.innerHTML = '<a href="https://gitee.com/celaraze/Chemex/tree/' + res + '" target="_blank">版本：' + res + ' 已发布。</a>';
                } else {
                    html.innerHTML = '很棒，已经是最新版本了！';
                }
            },
            error: function (res) {
                Dcat.error('执行错误：' + res);
            }
        });
    }

    /**
     * 更新数据库结构
     */
    function migrate() {
        $.ajax({
            url: "/version/migrate",
            success: function (res) {
                if (res.original.code === 200) {
                    Dcat.success(res.original.message);
                } else {
                    Dcat.warning(res.original.message);
                }
            },
            error: function (res) {
                Dcat.error('执行错误：' + res);
            }
        });
    }

    /**
     * 清理缓存
     */
    function clearCache() {
        $.ajax({
            url: "/version/clear",
            success: function (res) {
                if (res.original.code === 200) {
                    Dcat.success(res.original.message);
                } else {
                    Dcat.warning(res.original.message);
                }
            },
            error: function (res) {
                Dcat.error('执行错误：' + res);
            }
        });
    }
</script>
