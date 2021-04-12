<p align="center">
    <img src="https://tva1.sinaimg.cn/large/008eGmZEly1gov9jz5uk9j30n10zawfd.jpg" width="120"/>
</p>

<p align="center">
    <a href="https://chemex.celaraze.com" target="_blank">官方网站</a> |
    <a href="https://chemex-demo.celaraze.com" target="_blank">演示地址</a>（账密都是：admin） |
    <a href="https://jq.qq.com/?_wv=1027&k=tnV2HCWU">官方QQ群</a>
</p>

<p align="center">
    <img src="https://img.shields.io/badge/Latest Release-3.0.0-orange" />
    <img src="https://img.shields.io/badge/PHP-7.4+-green" />
    <img src="https://img.shields.io/badge/MySQL-8+-blueviolet" />
    <img src="https://img.shields.io/badge/License-GPL3.0-blue" />
</p>

<p align="center">
    <img src="https://travis-ci.com/Celaraze/Chemex.svg?branch=gesha" />
    <img src="https://app.fossa.com/api/projects/git%2Bgithub.com%2FCelaraze%2FChemex.svg?type=shield" />
</p>

<p align="center">
    <img src="https://app.fossa.com/api/projects/git%2Bgithub.com%2FCelaraze%2FChemex.svg?type=large" />
</p>

## Gitee Star 趋势

[![Stargazers over time](https://whnb.wang/img/celaraze/chemex)](https://whnb.wang/celaraze/chemex)

## 贡献者

[![Giteye chart](https://chart.giteye.net/gitee/celaraze/chemex/E8FNVV4W.png)](https://giteye.net/chart/E8FNVV4W)

## 鸣谢

没有它们就没有 咖啡壶（Chemex）：

`JetBrains` 提供优秀的IDE。

<a href="https://www.jetbrains.com/?from=Chemex" target="_blank">
<img src="https://tva1.sinaimg.cn/large/008eGmZEly1gov9g3tzrnj30u00wj0tn.jpg" width="150"/>
</a>

[Laravel](https://laravel.com/) ，优雅的 PHP Web 框架。

[Dcat Admin](https://dcatadmin.com) ，高颜值、高效率的后台开发框架。

`Dr. Peter Schlumbohm`，感谢发明了 Chemex 冲煮咖啡。

## 简介

咖啡壶（Chemex）是一个轻量的、现代设计风格的 ICT 资产管理系统。得益于 [Laravel](https://laravel.com/) 框架以及 [Dcat Admin](https://dcatadmin.com)
开发平台，使其具备了优雅、简洁的优秀体验。 咖啡壶（Chemex）
是完全免费且开源的，任何人都可以无限制的修改代码以及部署服务，这对于很多想要对ICT资产做信息化管理的中小型企业来说，是一个很好的选择：低廉的成本换回的是高效的管理方案，同时又有健康的生态提供支持。

## 特点

经典的 LNMP 环境即可运行。

使用先进的 Web 框架进行开发。

简洁优雅的使用体验。

灵活的可配置自定义字段。

### 版本

咖啡壶（Chemex）将会以咖啡豆品种作为 `major` 版本的命名，例如 `1.x` 版本称为 `肯亚（Kenya）`，旨在为 ICT 运维人员提供管理能力的同时，普及咖啡知识，静下心喝一杯属于当前版本的冲煮咖啡。

|major|版本名|状态|支持|
|----|----|----|----|
|1.x|肯亚（Kenya）|已废弃|已停止
|2.x|耶加雪菲（Yirgacheffe）|已废弃|已停止
|3.x|瑰夏（Gesha）|3.0.0-rc|2022-4-1

## 环境要求

`git`，用于管理版本，部署和升级必要工具。

`PHP 7.4 +` ，已经支持 PHP8 ，建议使用 PHP8。

`MySQL 8 +`，数据库引擎，理论上 `MariaDB 10.2 +` 兼容支持。

`ext-zip` 扩展。

`ext-json` 扩展。

`ext-fileinfo` 扩展。

`ext-ldap` 扩展。

`ext-bcmath` 扩展。

`ext-mysqli` 扩展。

`ext-xml` 扩展。

`ext-xmlrpc` 扩展。

以上扩展安装过程注意版本必须与 PHP 版本一致。

## 部署

### OVF

已同步更新只最新版本 `3.0.1` 。

考虑到部署复杂性，我们也提供了基于 Ubuntu 20.04 Server 制作的 OVF 包。OVF 支持 VMware ESXi 6.5+ 或 VMware Workstation 14.x+ 或 VMware Fusion
10.x+。

下载地址：[https://pan.baidu.com/s/1AuTv5UMxzzMkTdP9Ca5J_A](https://pan.baidu.com/s/1AuTv5UMxzzMkTdP9Ca5J_A)，提取码：`8mok`。

OVF 中包含以下组件：Nginx MySQL PHP7.4，网络通过 NAT 实现。

Ubuntu 账密：chemex/chemex

Web 程序主目录：/var/www/html

MySQL 账密：chemex/chemex

部署完成后，LNMP 服务会自启，先查看此虚拟机 IP，然后在其它主机直接通过 IP 访问 Web 服务即可。

### 手动

生产环境下为遵守安全策略，非常建议在服务器本地进行部署，暂时不提供相关线上初始化安装的功能。因此，虽然前期部署的步骤较多，但已经为大家自动化处理了很大部分的流程，只需要跟着下面的命令一步步执行，一般是不会有部署问题的。

1：为你的计算机安装 `git`，Windows 环境请安装 [Git for Windows](https://git-scm.com/download/win) ，Linux
环境一般都会自带，如果没有就执行 `yum install git` 或者 `apt install git` 命令来安装即可。

2：为你的计算机安装 `PHP` 环境，参考：[PHP官方](https://www.php.net/downloads) 。

3：为你的计算机安装 `mariaDB`。

4：在你想要的目录中，执行 `git clone https://gitee.com/celaraze/chemex.git` 完成下载。

5：在项目根目录中，复制 `.env.example` 文件为一份新的，并重命名为 `.env`。

6：在 `.env` 中配置数据库信息。

7：进入项目根目录，执行 `php artisan chemex:install` 进行安装。

8：你可能使用的web服务器为 `nginx` 以及 `apache`，无论怎样，应用的起始路径在 `/public` 目录，请确保指向正确，同时程序的根目录权限应该调整为：拥有者和你的 Web 服务器运行用户一致，例如 www
用户，且根目录权限为 `755`。`/storage` 目录设置为 `777` 权限。

9：修改web服务器的伪静态规则为：`try_files $uri $uri/ /index.php?$args;`。

10：此时可以通过访问 `http://your_domain` 来使用 咖啡壶。管理员账号密码为：`admin / admin`。

11：最后，根据需要对是否使用线上更新继续配置。

## 更新

### 线上

部署完成后需要将 PHP 的 `exec()` 函数从禁用列表中移除，使其生效。之后即可使用线上更新，操作步骤为 设置 - 版本信息 - 升级。

### 手动，通过Git Pull方式

随时随地保持更新可以在项目根目录中执行 `sudo git fetch --all && git reset --hard origin/main && git pull` 命令，将会同步分支的最新修改内容。

接着，执行 `php artisan chemex:update` 来进行升级。

> 如果从2.0升级到3.0，需要额外执行 `php artisan chemex:refresh-user`。

## 截图

![](https://tva1.sinaimg.cn/large/008eGmZEly1gov9d2pjiaj31lt0u0408.jpg)

![](https://tva1.sinaimg.cn/large/008eGmZEly1gov9csj82yj31lt0u0wgn.jpg)

![](https://tva1.sinaimg.cn/large/008eGmZEly1gov9d07mxfj314d0u0q5e.jpg)

![](https://tva1.sinaimg.cn/large/008eGmZEly1gov9cwrlz4j30ua0u0q63.jpg)

## 咖啡壶没有满足我的需求，我想要咖啡壶成为我想要的样子

咖啡壶是开源的，程序本体及其衍生工具的源码都在你的手中，你可以自行修改成为你想要的样子。

`Fork` 本仓库，修改代码，成为你的。

## 开源协议

咖啡壶（Chemex）遵循 [GPL3.0](https://www.gnu.org/licenses/gpl-3.0.html) 开源协议。
