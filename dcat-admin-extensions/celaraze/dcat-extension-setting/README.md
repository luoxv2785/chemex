# Dcat Setting

为 DcatAdmin 后台增加站点管理功能。修改过程利用 DcatAdmin 自带的 `admin_setting()` 方法实现，不会硬编码修改任何 config 文件或者 .env 文件。

## 安装方式

### 本地安装

下载本项目 `.zip` 包，在 `DcatAdmin` 后台的 `扩展` 菜单中，通过上传进行安装。

### Composer 安装

`composer require celaraze/dcat-extension-setting`

### 配置

在文件 `app/Admin/bootstrap.php` 中追加以下一行代码：

```PHP
\Celaraze\DcatSetting\Support::initConfig();
```

在菜单 `扩展` 中启用扩展后，会自动添加名为 `站点配置` 的菜单。
