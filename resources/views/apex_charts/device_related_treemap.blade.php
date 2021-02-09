<script src="https://cdn.jsdelivr.net/npm/echarts@5.0.2/dist/echarts.min.js"></script>
<div id="main" style="height: 350px"></div>

<script>
    Dcat.ready(function () {
        const chartDom = document.getElementById('main');
        const myChart = echarts.init(chartDom);
        let option;

        let data = {
            name: 'PC001',
            children: [
                {
                    name: "配件",
                    children: [
                        {
                            name: "i5-10500"
                        },
                        {
                            name: "WD 500 GB"
                        }
                    ]
                },
                {
                    name: "软件",
                    children: [
                        {
                            name: "Windows 10 pro"
                        },
                        {
                            name: "Office 2016 STD"
                        }
                    ]
                },
                {
                    name: "服务",
                    children: [
                        {
                            name: "LDAP"
                        },
                        {
                            name: "FTP"
                        },
                        {
                            name: "AD"
                        }
                    ]
                }
            ]
        };

        myChart.setOption(option = {
            tooltip: {
                trigger: 'item',
                triggerOn: 'mousemove'
            },
            series: [
                {
                    left: '20%',
                    type: 'tree',
                    data: [data],
                    symbolSize: 12,
                    label: {
                        position: 'left',
                        verticalAlign: 'middle',
                        align: 'right',
                        fontSize: 10
                    },
                    leaves: {
                        label: {
                            position: 'right',
                            verticalAlign: 'middle',
                        }
                    },
                    emphasis: {
                        focus: 'descendant'
                    },
                    expandAndCollapse: true,
                    animationDuration: 500,
                    animationDurationUpdate: 500
                }
            ]
        });

        myChart.setOption(option);
    });

</script>
