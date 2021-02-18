<a id="upgrade" class="btn btn-primary" style="width: 100%;" onclick="upgrade()">{{trans('main.upgrade')}}</a>

<script>
    /**
     * 升级
     */
    function upgrade() {
        document.getElementById('upgrade').attr('disabled', "true");
        document.getElementById('upgrade').innerText = '正在更新';
        $.ajax({
            url: "/version/upgrade",
            success: function (res) {
                if (res.data.code === 200) {
                    Dcat.success(res.data.message);
                } else {
                    Dcat.warning(res.data.message);
                }
            },
            error: function (res) {
                Dcat.error('执行错误：' + res);
            }
        });
    }
</script>
