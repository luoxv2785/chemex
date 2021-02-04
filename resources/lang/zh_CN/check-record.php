<?php
return [
    'labels' => [
        'CheckRecord' => '盘点',
        'records' => '盘点任务',
        'User' => '负责人',
        'Report' => '生成报告',
        'Record None' => '没有此盘点任务',
        'Item None' => '没有此物资',
        'Incomplete' => '还有未完成的相同盘点，请先处理'
    ],
    'fields' => [
        'check_item' => '盘点项目',
        'start_time' => '开始时间',
        'end_time' => '结束时间',
        'user' => [
            'name' => '负责人'
        ],
        'checker' => [
            'name' => '盘点人'
        ],
        'check_id' => '任务ID',
        'item_id' => '物件',
        'status' => '状态',
        'creator' => '创建者',
        'check_all_counts' => '盘点总数',
        'check_yes_counts' => '盘盈数量',
        'check_no_counts' => '盘亏数量',
        'check_left_counts' => '未盘数量',
    ],
    'options' => [
    ],
];
