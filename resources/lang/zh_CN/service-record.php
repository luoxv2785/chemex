<?php

return [
    'labels' => [
        'title' => '服务',
        'description' => '主数据列表',
        'records' => '服务',
        'Status Help' => '勾选此项为暂停服务。',
        'Issue Create' => '报告异常',
        'Delete' => '删除服务',
        'Record None' => '没有此服务记录！',
        'Delete Success' => '成功删除服务: ',
        'Delete Confirm' => '确认删除？',
        'Delete Confirm Description' => '删除的同时将会解除所有与之关联的归属关系',
        'Track Create Update' => '归属到设备',
        'Deleted' => '已删除',
        'Track Delete' => '解除归属',
        'Track Delete Confirm' => '确认解除与此用户的关联？'],
    'fields' => [
        'name' => '名称',
        'description' => '描述',
        'status' => '状态',
        'device' => [
            'asset_number' => '所属设备',
        ],
        'price' => '价格',
        'purchased' => '购入日期',
        'expired' => '过保日期',
        'channel' => [
            'name' => '购入途径',
        ],
        'device_id' => '设备',
        'issue' => '异常',
        'start' => '开始时间',
        'purchased_channel_id' => '购入途径',
    ],
    'options' => [
    ],
];
