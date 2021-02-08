<?php
return [
    'labels' => [
        'SoftwareRecord' => '软件',
        'description' => '主数据列表',
        'records' => '软件',
        'Purchased Channel' => '购入途径',
        'Manage Track' => '管理归属',
        'Track Card Title' => '授权',
        'History Card Title' => '履历',
        'Export To Excel' => '导出到 Excel',
        'Counts Help' => '"-1"表示无限制。',
        'Location Help' => '记录存放位置，例如某个货架、某个抽屉。',
        'Batch Delete' => '批量删除软件',
        'Batch Delete Confirm' => '您确定要删除选中的软件吗？',
        'Batch Delete Success' => '批量删除软件成功！',
        'Delete' => '删除软件',
        'Delete Success' => '成功删除软件！',
        'Delete Confirm' => '确认删除？',
        'Delete Confirm Description' => '删除的同时将会解除所有与之关联的归属关系',
        'Track Create Update' => '归属到设备',
        'Import' => '导入',
        'File Help' => '导入支持xls、xlsx、csv文件，且表格头必须使用【名称，描述，分类，资产编号，厂商，版本，价格，购入日期，过保日期，购入途径】。',
        'Device Help' => '选择新设备后，将会自动解除此软件与老设备的归属关系。'
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
        'left_counts' => '剩余授权数量',
        'device' => [
            'name' => '设备',
            'staff' => [
                'name' => '雇员'
            ]
        ],
        'asset_number' => '资产编号',
        'location' => '位置',
        'expiration_left_days' => '剩余保固时间',
        'category_id' => '分类',
        'vendor_id' => '厂商',
        'depreciation_id' => '折旧规则',
        'extended_fields' => '自定义信息',
        'file' => '文件',
        'device_id' => '设备'
    ],
    'options' => [
    ],
];
