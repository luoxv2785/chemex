<?php
return [
    'labels' => [
        'title' => '平台配置',
        'ldap' => 'LDAP',
        'platform' => '平台',
        'extensions' => '扩展',
        'Configuration Success' => 'LDAP配置更新成功！',
        'Host Primary Help' => '域控主机的域名地址或者ip地址。',
        'Host Secondary Help' => '域控主机的域名地址或者ip地址，这是一个备用地址，如果主域控无法连接，将自动选择备域控。',
        'Port Primary Help' => '主域控服务的端口号。',
        'Port Secondary Help' => '备域控服务的端口号。',
        'Base DN' => '域控的起始域名，格式请按照 dc=corp,dc=acme,dc=org 填写。',
        'Login' => '域登录将优先于传统登录。',
        'Bind Administrator' => '指定的域账户将作为咖啡壶的管理员角色。',
        'Test Connection' => '测试连接（请先保存配置）',
        'Test Connection Help' => '请先保存配置后进行连接测试。',
        'Connect Success' => '连接LDAP服务器验证成功！',
        'Connect Missing Password' => '缺失必要的密码！',
        'Connect Missing Username' => '缺失必要的用户名！',
        'LDAP Disabled' => 'LDAP未启用！',
        'Connect Fail' => '连接失败，请确认配置信息！',
        'Connect Error' => '执行错误：'
    ],
    'fields' => [
        'ad_enabled' => '启用状态',
        'ad_host_primary' => '主域控地址',
        'ad_host_secondary' => '备域控地址',
        'ad_port_primary' => '主域控端口',
        'ad_port_secondary' => '备域控端口',
        'ad_base_dn' => '域控根名',
        'ad_username' => '域控验证用户',
        'ad_password' => '域控验证密码',
        'ad_use_ssl' => '启用SSL',
        'ad_use_tls' => '启用TLS',
        'ad_login' => '启用域登录',
        'ad_bind_administrator' => '域管理员的账户'
    ],
    'options' => [
    ],
];
