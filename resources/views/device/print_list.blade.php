<!DOCTYPE html>
<html>
<head lang="zh">
    <meta charset="UTF-8">
    <title>设备打印详细单</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="{{asset("static/js/print/bootstarp.css")}}" crossorigin="anonymous">


</head>
<body>


<script src="/static/js/print/jquery-qrcode.min.js"></script>

<div class="print">
    <style>
        .table-bordered > tbody > tr > td,
        .table-bordered > thead > tr > th,
        .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th,
        .table-bordered > tfoot > tr > td {
            text-align: left;
        }

        .card {
            position: relative;
        }

        .card .postImg {
            width: 160px;
            height: 100px;
            position: absolute;
            right: 115px;
            top: 80px;
            z-index: 999;
        }

        .card .postImg img {
            width: 100%;
        }

    </style>

    @foreach($data as $service)
        <div class="card ">
            <table class="table table-bordered">
                <i class="postImg"><img src="/static/js/print/images/stamp_0003.png"/></i>

                <caption class="text-center"><h3>设备标签单</h3></caption>
                <thead>
                <tr>
                    <th colspan="3">资产编号：{{$service['asset_number']}}</th>
                    <th colspan="4">资产名称：{{$service['name']}}</th>

                </tr>
                <tr>
                    <th colspan="3">使用人：{{$service->admin_user()->value('name')}}</th>
                    <th colspan="4">设备分类：{{$service->category()->value('name')}}</th>

                </tr>
                <tr>
                    <th colspan="3">添加时间：{{$service['created_at']}}</th>
                    <th colspan="4">设备备注：{{$service['description']}}</th>
                </tr>
                <tr>
                    <th>设备名称</th>
                    <th>资产编号</th>
                    <th>IP地址</th>
                    <th>MAC地址</th>
                    <th>购入日期</th>
                    <th>购入价格</th>
                    <th>过保日期</th>
                </tr>
                </thead>

                <tbody>

                <tr>

                    <th>{{$service['name']}}</th>
                    <th>{{$service['asset_number']}}</th>
                    <th>{{$service['ip']}}</th>
                    <th>{{$service['mac']}}</th>
                    <th>{{$service['purchased']}}</th>
                    <th>{{$service['price']}}</th>
                    <th>{{$service['expired']}}</th>

                </tr>

                </tbody>

            </table>
        </div>
    @endforeach
</div>

</body>

<script src="/static/js/print/qrcode.js"></script>
<script src="/static/js/print/jquery.js"></script>
<script src="/static/js/print/jquery.print.js"></script>
<script>
    $(".print").jqprint();
</script>


</html>
