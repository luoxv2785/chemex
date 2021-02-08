<?php
return [
    'labels' => [
        'ServiceRecord' => '服务',
        'description' => '主数据列表',
        'records' => '服务',
        'Purchased Channel' => '购入途径',
        'Status Help' => '勾选此项为暂停服务。',
        'Issue Create' => '报告异常',
        'Delete' => '删除服务',
        'Record None' => '没有此服务记录！',
        'Delete Success' => '成功删除服务: ',
        'Delete Confirm' => '确认删除？',
        'Delete Confirm Description' => '删除的同时将会解除所有与之关联的归属关系',
        'Track Create Update' => '归属到设备',
        'Device Help' => '选择新设备后，将会自动解除此服务程序与老设备的归属关系。'
    ],
    'fields' => [
        'name' => '名称',
        'description' => '描述',
        'status' => '状态',
        'device' => [
            'name' => '设备名称'
        ],
        'price' => '价格',
        'purchased' => '购入日期',
        'expired' => '过保日期',
        'channel' => [
            'name' => '购入途径'
        ],
        'extended_fields' => '自定义信息',
        'device_id' => '设备',
        'issue' => '异常',
        'start' => '开始时间'
    ],
    'options' => [
    ],
];
