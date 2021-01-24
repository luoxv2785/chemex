<?php
return [
    'labels' => [
        'SoftwareRecord' => '软件',
        'Category' => '分类',
        'Vendor' => '厂商',
        'Left Counts' => '剩余授权数量',
        'Purchased Channel Id' => '购入途径',
        'Expiration Left Days' => '保固剩余天数',
        'records' => '软件',
    ],
    'fields' => [
        'qrcode' => '二维码',
        'name' => '名称',
        'description' => '描述',
        'category' => [
            'name' => '软件分类'
        ],
        'version' => '版本',
        'vendor' => [
            'name' => '厂商'
        ],
        'channel' => [
            'name' => '购入途径'
        ],
        'price' => '价格',
        'purchased' => '购入时间',
        'expired' => '过保时间',
        'distribution' => '发行方式',
        'sn' => '序列号',
        'counts' => '授权数量',
        'device' => [
            'name' => '设备',
            'staff' => [
                'name' => '雇员'
            ]
        ],
        'asset_number' => '资产编号',
        'location' => '位置'
    ],
    'options' => [
    ],
];
