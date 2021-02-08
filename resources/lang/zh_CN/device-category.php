<?php
return [
    'labels' => [
        'DeviceCategory' => '设备',
        'description' => '支持多级树形结构',
        'categories' => '设备分类',
        'Parent' => '父级分类',
        'Depreciation Rule' => '折旧规则',
        'Import' => '导入',
        'File Help' => '导入支持xls、xlsx、csv文件，且表格头必须使用【名称，描述】。'
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
        'file' => '文件'
    ],
    'options' => [
    ],
];
