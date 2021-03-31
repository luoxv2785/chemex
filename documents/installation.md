### 安装部署

生产环境下为遵守安全策略，非常建议在服务器本地进行部署，暂时不提供相关线上初始化安装的功能。因此，虽然前期部署的步骤较多，但已经为大家自动化处理了很大部分的流程，只需要跟着下面的命令一步步执行，一般是不会有部署问题的。

1：为你的计算机安装 `git`，Windows 环境请安装 [Git for Windows](https://git-scm.com/download/win) ，Linux
环境一般都会自带，如果没有就执行 `yum install git` 或者 `apt install git` 命令来安装即可。

2：为你的计算机安装 `PHP` 环境，参考：[PHP官方](https://www.php.net/downloads) 。

3：为你的计算机安装 `mariaDB`。

4：为你的计算机安装 `composer` 包管理工具，没有此工具请安装 [Composer Install](https://getcomposer.org/download/) ，Ubuntu
环境下可以直接执行 `apt install composer` 完成安装。

4：创建一个数据库，命名任意，但记得之后填写配置时需要对应正确，并且数据库字符集为 `utf8-general-ci`。

5：在你想要的目录中，执行 `git clone https://gitee.com/celaraze/chemex.git` 完成下载。

6：在项目根目录中，复制 `.env.example` 文件为一份新的，并重命名为 `.env`。

7：在 `.env` 中配置数据库信息。

8：在项目根目录中，执行 `composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/`
，然后继续执行 `composer install -vvv` 来安装依赖。

8：进入项目根目录，执行 `php artisan chemex:install` 进行安装。

9：你可能使用的web服务器为 `nginx` 以及 `apache`，无论怎样，应用的起始路径在 `/public` 目录，请确保指向正确，同时程序的根目录权限应该调整为：拥有者和你的 Web
服务器运行用户一致，且根目录权限为 `755`。

10：修改web服务器的伪静态规则为：`try_files $uri $uri/ /index.php?$args;`。

11：此时可以通过访问 `http://your_domain` 来使用 咖啡壶。管理员账号密码为：`admin / admin`。
