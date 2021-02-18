<a id="upgrade" class="btn btn-primary" style="width: 100%;color: white"
   onclick="upgrade()">{{trans('main.upgrade')}}</a>

<script>
    /**
     * 升级
     */
    function upgrade() {
        let dom = $('#upgrade');
        dom.addClass('disabled');
        dom.innerText = '正在更新';
        $.ajax({
            url: "/version/upgrade",
            success: function (res) {
                if (res.code === 200) {
                    location.reload();
                } else {
                    Dcat.warning(res.message);
                }
            },
            error: function (res) {
                Dcat.error('执行错误：' + res.data);
            }
        });
    }
</script>
