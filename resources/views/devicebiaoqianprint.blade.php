<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<head lang="en">
    <meta charset="UTF-8">
    <title>设备打印标签</title>
    <style type="text/css">
        <!--
        table {
            color: #ffffff;
            font-weight: bold;
            font-size:11px;
            font-family:"微软雅黑";

        }
        .STYLE4 {color: #ffffff}
        -->


    </style>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
    <script type="text/javascript" src="/static/printjs/qr/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="/static/printjs/qrcode.js"></script>
    <script type="text/javascript" src="/static/printjs/qr/jquery.jqprint-0.3.js"></script>

</head>
<body>
<script language="javascript">

    function aa(){
        $("#ddd").jqprint();
    }
</script>




<div id="ddd">
    @foreach($data as $service)

    <table border="0" cellpadding="0" cellspacing="0"  >

        <tr>



            <td>

                <table width="235" border="1" cellpadding="0" cellspacing="0" style="color: #ffffff;font-weight: bold;font-size:11px;font-family:微软雅黑;">

                    <input id="text{{$service['asset_number']}}" type="hidden" value="http://203.25.212.205:9999/device/shouji/{{$service['id']}}" >
                    <tr>
                        <td colspan="2"><img src="/static/printjs/images/asset_logo4.gif" width="235" height="23" /></td>
                    </tr>
                    <tr>
                        <td width="165" bgcolor="#23b14d"><span class="STYLE4">名称：{{$service['name']}}</span></td>

                        <td width="70"  rowspan="3">
                            <div id="qrcode{{$service['asset_number']}}" style="width:70px; height:70px; "></div>
                            <script type="text/javascript">
                                var qrcode = new QRCode(document.getElementById("qrcode{{$service['asset_number']}}"), {
                                    width : 70,
                                    height : 70,
                                });

                                function makeCode () {
                                    var elText = document.getElementById("text{{$service['asset_number']}}");

                                    qrcode.makeCode(elText.value);
                                }

                                makeCode();
                                $("#text").
                                on("blur", function () {
                                    makeCode();
                                }).
                                on("keydown", function (e) {
                                    if (e.keyCode == 13) {
                                        makeCode();
                                    }
                                });
                            </script></td>
                    </tr>
                    <tr bgcolor="#23b14d">
                        <td width="165"><span class="STYLE4">编号：{{$service['asset_number']}}</span></td>
                    </tr>
                    <tr bgcolor="#23b14d">
                        <td width="165"><span class="STYLE4">人员：{{$service->admin_user()->value('name')}}</span></td>

                    </tr>
                </table>

            </td>
            <td width="15"></td>
            </tr><tr height=7><td colspan=6></td></tr><tr>

    </table>
    @endforeach
</div>

</div>

<script>
    $("#ddd").jqprint();
</script>
</body>
</html>
