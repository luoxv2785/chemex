<?php


namespace App\Admin\Metrics;


use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\ApexCharts\Chart;

class DeviceRelatedTreemap extends Chart
{
    public function __construct($containerSelector = null, $options = [])
    {
        parent::__construct($containerSelector, $options);

        $this->setUpOptions();
    }

    /**
     * 初始化图表配置
     */
    protected function setUpOptions()
    {
        $color = Admin::color();

        $colors = [$color->primary(), $color->primaryDarker()];

        $this->options([
            'colors' => $colors,
            'chart' => [
                'type' => 'treemap',
                'height' => 430
            ],
            'legend' => [
                'show' => false
            ],
        ]);
    }

    /**
     * 渲染图表
     *
     * @return string
     */
    public function render(): string
    {
        $this->buildData();

        return parent::render();
    }

    /**
     * 处理图表数据
     */
    protected function buildData()
    {
        $data = [
            [
                'name' => 'desktop',
                'data' => [
                    [
                        'x' => 'PC01',
                        'y' => 100,
                    ],
                    [
                        'x' => 'PC02',
                        'y' => 120,
                    ]
                ]
            ],
        ];

        $this->withData($data);
    }

    /**
     * 设置图表数据
     *
     * @param array $data
     *
     * @return $this
     */
    public function withData(array $data): DeviceRelatedTreemap
    {
        return $this->option('series', $data);
    }
}
