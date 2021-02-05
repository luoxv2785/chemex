<?php
return [
    'labels' => [
        'DeviceRecord' => '设备',
        'records' => '设备',
        'Category' => '分类',
        'Vendor' => '厂商',
        'Purchased Channel' => '购入途径',
        'Expiration Left Days' => '保固剩余天数',
        'Depreciation Rule' => '折旧规则',
        'Depreciation Price' => '折旧价格',
        'Current Staff' => '当前使用者',
        'Photo Help' => '可以选择提供一张设备的照片作为概览。',
        'Security Password Help' => '安全密码，可以代表BIOS密码等。',
        'Admin Password Help' => '管理员密码，可以代表计算机管理员账户密码以及打印机管理员密码等。',
        'Depreciation Rule Help' => '设备记录的折旧规则将优先于其分类所指定的折旧规则。',
        'Location Help' => '记录存放位置，例如某个货架、某个抽屉。',
        'Batch Delete' => '批量删除设备',
        'Batch Delete Confirm' => '您确定要删除选中的设备吗？',
        'Batch Delete Success' => '批量删除设备成功！',
        'Delete' => '删除设备',
        'Delete Success' => '成功删除设备！',
        'Delete Confirm' => '确认删除？',
        'Delete Confirm Description' => '删除的同时将会解除所有与之关联的归属关系',
        'Update SSH' => '编辑SSH连接信息',
        'Track Create Update' => '分配使用者',
        'Maintenance Create' => '报告故障',
        'Import' => '导入',
        'File Help' => '导入支持xls、xlsx、csv文件，且表格头必须使用【名称，描述，分类，厂商，资产编号，雇员，序列号，MAC，IP，价格，购入日期，过保日期，购入途径】。',
        'Record None' => '设备不存在',
        'Update SSH Success' => 'SSH信息配置成功！',
        'Staff Record None' => '雇员不存在',
        'Staff Record Same' => '使用者没有改变，无需重新分配',
        'Update Track Success' => '使用者分配成功',
        'New Staff Record' => '新使用者',
        'Staff Id Help' => '选择新使用者后，将会自动解除此设备与老使用者的归属关系。',
        'Item None' => '物品不存在',
        'Create Maintenance Success' => '维修记录保存成功',

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
        'sn' => '序列号',
        'mac' => 'MAC',
        'ip' => 'IP',
        'photo' => '照片',
        'staff' => [
            'name' => '雇员',
            'department' => [
                'name' => '部门'
            ],
            'department_id' => '部门',
        ],
        'price' => '价格',
        'purchased' => '购入日期',
        'expired' => '过保日期',
        'security_password' => '安全密码',
        'admin_password' => '管理员密码',
        'part' => [
            'category' => [
                'name' => '分类'
            ],
            'name' => '名称',
            'specification' => '规格',
            'sn' => '序列号',
            'vendor' => [
                'name' => '厂商'
            ]
        ],
        'software' => [
            'category' => [
                'name' => '分类'
            ],
            'name' => '名称',
            'version' => '版本',
            'distribution' => '发行方式',
            'vendor' => [
                'name' => '厂商'
            ]
        ],
        'service' => [
            'name' => '名称'
        ],
        'depreciation' => [
            'name' => '折旧规则'
        ],
        'asset_number' => '资产编号',
        'location' => '位置',
        'category_id' => '分类',
        'vendor_id' => '厂商',
        'depreciation_id' => '折旧规则',
        'ng_description' => '故障说明',
        'ng_time' => '故障发生时间'
    ],
    'options' => [
    ],
];
