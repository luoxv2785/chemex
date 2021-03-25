# chemex windows 平台搭建说明

## 1.搭建 PHP 环境网站服务器

### 1.1 以 phpstudy 为例， 下载

官网地址 `https://m.xp.cn/` 在主页中点击下载，默认会跳转下载链接 `http://public.xp.cn/upgrades/phpStudy_64.7z` ，如无法下载，把 7z 改成 zip，如 `http://public.xp.cn/upgrades/phpStudy_64.zip` 。

### 1.2 设置 php

安装后打开软件，在首页中启动 Apache 和 mysql 数据库。在软件管理中，点 php，选择 php7.4 版本下载，因为默认安装的 7.3，chemex 只支持 7.4 以上。 安装完成 php7.4 后再点击 composer ，点击安装。

![](https://tva1.sinaimg.cn/large/008eGmZEly1gowcyqy3ypj30ln0b0q38.jpg)

![](https://tva1.sinaimg.cn/large/008eGmZEly1gowczgb14tj30lr0axjrf.jpg)



![](https://tva1.sinaimg.cn/large/008eGmZEgy1gowczxp5xvj30pe0bdjrh.jpg)

![](https://tva1.sinaimg.cn/large/008eGmZEgy1gowd0aocv2j30oc08u3yk.jpg)

安装后点网址-管理-切换 php 版本为 7.4，同时点击下面的 php 扩展，开启 ldap，不开的话，后续有可能报错。

备注：如出现php.exe启动报错缺少dll的情况，可以把php7.3目录里的dll文件提取到7.4目录中。也可反过来把7.4目录中的文件全部覆盖到7.3目录中，再修改目录名称为7.4的。

### 1.3 设置数据库

点击数据库，默认安装的 mysql 可用，也可下载其他版本。点数据库-创建数据库，名称和用户名密码自定义。

![](https://tva1.sinaimg.cn/large/008eGmZEgy1gowd0h0xpxj30m20c1t8p.jpg)

## 2.chemex 源码下载和配置

### 2.1 下载源码

打开 gitee 网址搜索或直接访问 `https://gitee.com/celaraze/chemex` 点击【克隆/下载】 在点下载 ZIP。按提示如未登录，注册账号登录下载。

![](https://tva1.sinaimg.cn/large/008eGmZEgy1gowd0p7wt6j30sl0b0jrp.jpg)

### 2.2 解压配置数据库

下载后的 chemex.zip 解压到指定目录，如 c 盘，到 `c:\chemex` 目录下找到 `.env.example` 文件，重命名为`.env` ，如重命名遇到问题可以另存为。 重命名后修改三个地方，分别是数据库名称、用户名、密码 ：DB_DATABASE 、DB_USERNAME 、DB_PASSWORD 。改成自己 1.3 中定义的内容。

### 2.3 安装 chemex 系统

网站中点击管理 composer，会弹出选择版本，把 php 切换成 php7.4 点确定。

![](https://tva1.sinaimg.cn/large/008eGmZEgy1gowd113l6fj30mf09agln.jpg)

![](https://tva1.sinaimg.cn/large/008eGmZEgy1gowd179bynj30lp09fglm.jpg)

![](https://tva1.sinaimg.cn/large/008eGmZEgy1gowd1fjyndj30h304kq2q.jpg)

弹出的命令行中，进入到之前的解压路径如 `c:\chemex`， 如果不是用 cd 切换目录。 执行安装命令： `php artisan chemex:install`

## 3.安装后的设置和访问

### 3.1 设置 public 网站目录

安装成功后，点击网站-管理-修改，把网站的根目录改成 chemex 下的 public 目录，如 `c:/chemexe/public`

![](https://tva1.sinaimg.cn/large/008eGmZEgy1gowd1mb60wj30m508tmx6.jpg)

![](https://tva1.sinaimg.cn/large/008eGmZEgy1gowd1tmw7bj30cr0ciaa1.jpg)

### 3.2 设置目录访问权限

点击网站-管理伪静态，或者找到 public 目录下的 .htaccess 文件，修改成如下内容。

备注：按官方说明修改 web 服务器的伪静态规则为：`try_files $uri $uri/ /index.php?$args;` 实测有问题，请按如下进行修改。

```
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

### 3.3 访问 chemex

在浏览器输入 localhost 或在 phpstudy 点击管理-打开网站即可访问网站。管理员账号密码为：admin / admin

备注：网址路径根据情况可以自己定义域名或 ip。

## 4.手动升级

停止网站，重命名 chemex 目录，参考 2.1, 2.2 下载最新 zip 包后解压到对应目录，执行升级命令： php artisan chemex:update。
