<?php
return [
    'labels' => [
        'StaffRecord' => '组织',
        'Department' => '部门',
        'records' => '雇员',
        'Staff Record' => '雇员',
        'Staff Department' => '部门',
        'Batch Delete' => '批量删除雇员',
        'Batch Delete Confirm' => '您确定要删除选中的雇员吗？',
        'Batch Delete Success' => '批量删除雇员成功！',
        'Delete' => '删除雇员',
        'Delete Success' => '成功删除雇员！',
        'Delete Confirm' => '确认删除？',
        'Delete Confirm Description' => '删除的同时将会解除所有与之关联的归属关系',
        'Import' => '导入',
        'LDAP Import Success' => 'LDAP导入成功！',
        'File Help' => '导入支持xls、xlsx、csv文件，且表格头必填栏位【名称、部门、性别】，可选栏位【职位、手机、邮箱】。',
        'Rewrite' => '覆盖',
        'Merge' => '合并',
        'File' => '文件',
        'LDAP' => 'LDAP'
    ],
    'fields' => [
        'name' => '名称',
        'department' => [
            'name' => '部门'
        ],
        'gender' => '性别',
        'title' => '职位',
        'mobile' => '手机',
        'email' => '邮箱',
        'mode' => '模式'
    ],
    'options' => [
    ],
];
