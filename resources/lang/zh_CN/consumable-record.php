<?php
return [
    'labels' => [
        'ConsumableRecord' => '耗材',
        'records' => '耗材',
        'Category Id' => '分类',
        'Vendor Id' => '厂商'

    ],
    'fields' => [
        'name' => '名称',
        'description' => '描述',
        'specification' => '规格',
        'category' => [
            'name' => '分类'
        ],
        'vendor' => [
            'name' => '厂商'
        ],
        'price' => '价格',
        'number' => '总数'
    ]
];
