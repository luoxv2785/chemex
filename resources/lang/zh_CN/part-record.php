<?php
return [
    'labels' => [
        'PartRecord' => '配件',
        'records' => '配件',
        'Category' => '分类',
        'Vendor' => '厂商',
        'Purchased Channel' => '购入途径',
        'Depreciation Rule' => '折旧规则',
        'Location Help' => '记录存放位置，例如某个货架、某个抽屉。',
        'Batch Delete' => '批量删除配件',
        'Batch Delete Confirm' => '您确定要删除选中的配件吗？',
        'Batch Delete Success' => '批量删除配件成功！'
    ],
    'fields' => [
        'qrcode' => '二维码',
        'name' => '名称',
        'description' => '描述',
        'category' => [
            'name' => '分类'
        ],
        'vendor' => [
            'name' => '厂商'
        ],
        'channel' => [
            'name' => '购入途径'
        ],
        'device' => [
            'name' => '所属设备'
        ],
        'specification' => '规格',
        'sn' => '序列号',
        'price' => '价格',
        'purchased' => '购入日期',
        'expired' => '过保日期',
        'depreciation' => [
            'name' => '折旧规则',
            'termination' => '报废日期'
        ],
        'asset_number' => '资产编号',
        'location' => '位置',
        'expiration_left_days' => '剩余保固时间',
    ]
];
