### 升级

随时随地保持更新可以在项目根目录中执行 `sudo git reset --hard && git pull --force` 命令，将会同步分支的最新修改内容。

接着，执行 `composer update -vvv` 来更新底层依赖。

接着，执行 `php artisan chemex:update` 来进行升级。

### 扩展升级

进入 `扩展` 菜单后，如果扩展有新版本可用，将会在扩展列表中给出提醒，直接点击 `更新至···` 即可完成升级。
