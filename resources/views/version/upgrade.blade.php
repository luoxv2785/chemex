<a id="upgrade" class="btn btn-primary" style="width: 100%;" onclick="upgrade()">{{trans('main.upgrade')}}</a>

<script>
    /**
     * 升级
     */
    function upgrade() {
        document.getElementById('upgrade').disabled = true;
        $.ajax({
            url: "/version/upgrade",
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
