<?php
return [
    'labels' => [
        'title' => '设备',
        'description' => '支持多级树形结构',
        'categories' => '设备分类',
        'Parent' => '父级分类',
        'Depreciation Rule' => '折旧规则',
        'Import' => '导入',
    ],
    'fields' => [
        'name' => '名称',
        'description' => '描述',
        'parent' => [
            'name' => '父级分类'
        ],
        'depreciation' => [
            'name' => '折旧规则'
        ],
    ],
    'options' => [
    ],
];
