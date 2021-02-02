<?php


namespace App\Support;


use App\Models\CheckRecord;
use App\Models\CheckTrack;
use App\Models\DepreciationRule;
use App\Models\DeviceCategory;
use App\Models\DeviceRecord;
use App\Models\DeviceTrack;
use App\Models\StaffRecord;
use Dcat\Admin\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Support
{
    /**
     * 获取所有物品的类型和ID，并且以 device:1 形式加入到数组中返回
     * @return array
     */
    public static function getAllItemTypeAndId(): array
    {
        $data = [];
        $device_records = DeviceRecord::all();
        if (Admin::extension()->enabled('celaraze/chemex-part')) {
            $class = 'Celaraze\\Chemex\\Part\\Models\\PartRecord';
            $part_records = $class::all();
        } else {
            $part_records = [];
        }
        if (Admin::extension()->enabled('celaraze/chemex-software')) {
            $class = 'Celaraze\\Chemex\\Software\\Models\\SoftwareRecord';
            $software_records = $class::all();
        } else {
            $software_records = [];
        }

        foreach ($device_records as $device_record) {
            array_push($data, 'device:' . $device_record->id . '&#10;');
        }
        foreach ($part_records as $part_record) {
            array_push($data, 'part:' . $part_record->id . '&#10;');
        }
        foreach ($software_records as $software_record) {
            array_push($data, 'software:' . $software_record->id . '&#10;');
        }
        return $data;
    }

    /**
     * 获取设备当前最新的使用者
     * @param $device_id
     * @return string
     */
    public static function currentDeviceTrackStaff($device_id)
    {
        $device_track = DeviceTrack::where('device_id', $device_id)->first();
        if (empty($device_track)) {
            return 0;
        } else {
            $staff = $device_track->staff;
            if (empty($staff)) {
                return -1;
            } else {
                return $staff->id;
            }
        }
    }

    /**
     * 物品履历 形成清单数组（未排序）
     * @param $template
     * @param $item_track
     * @param array $data
     * @return array
     */
    public static function itemTrack($template, $item_track, $data = []): array
    {
        $template['status'] = '+';
        $template['datetime'] = json_decode($item_track, true)['created_at'];
        array_push($data, $template);
        if (!empty($item_track->deleted_at)) {
            $template['status'] = '-';
            $template['datetime'] = json_decode($item_track, true)['deleted_at'];
            array_push($data, $template);
        }
        return $data;
    }

    /**
     * 计算盘点任务记录的数量
     * @param $check_id
     * @param string $type
     * @return int
     */
    public static function checkTrackCounts($check_id, $type = 'A'): int
    {
        $check_record = CheckRecord::where('id', $check_id)->first();
        if (empty($check_record)) {
            return 0;
        }

        switch ($type) {
            case 'Y':
                $count = CheckTrack::where('check_id', $check_id)
                    ->where('status', 1)
                    ->count();
                break;
            case 'N':
                $count = CheckTrack::where('check_id', $check_id)
                    ->where('status', 2)
                    ->count();
                break;
            case 'L':
                $count = CheckTrack::where('check_id', $check_id)
                    ->where('status', 0)
                    ->count();
                break;
            default:
                $count = CheckTrack::where('check_id', $check_id)
                    ->withTrashed()
                    ->count();

        }

        return $count;
    }

    /**
     * 雇员id换取name
     * @param $staff_id
     * @return string
     */
    public static function staffIdToName($staff_id): string
    {
        $staff = StaffRecord::where('id', $staff_id)->first();
        if (empty($staff)) {
            return '雇员失踪';
        }
        return $staff->name;
    }

    /**
     * 雇员id换取部门name
     * @param $staff_id
     * @return mixed
     */
    public static function staffIdToDepartmentName($staff_id): string
    {
        $staff = StaffRecord::where('id', $staff_id)->first();
        if (!empty($staff)) {
            return $staff->department->name;
        } else {
            return '无部门';
        }
    }

    /**
     * 设备ID换取雇员名称
     * @param $device_id
     * @return string
     */
    public static function deviceIdToStaffName($device_id): string
    {
        $device = DeviceRecord::where('id', $device_id)->first();
        if (empty($device)) {
            return '设备状态异常';
        } else {
            $staff = $device->staff;
            if (empty($staff)) {
                return '闲置';
            } else {
                return $staff->name;
            }
        }
    }

    /**
     * 设备id获取操作系统标识
     * @param $device_id
     * @return string
     */
    public static function getSoftwareIcon($device_id): string
    {
        $class = 'Celaraze\\Chemex\\Software\\Models\\SoftwareTrack';
        if (class_exists($class)) {
            $software_tracks = $class::where('device_id', $device_id)
                ->get();
            $tags = Data::softwareTags();
            $keys = array_keys($tags);
            foreach ($software_tracks as $software_track) {
                $name = trim($software_track->software()->withTrashed()->first()->name);
                for ($n = 0; $n < count($tags); $n++) {
                    for ($i = 0; $i < count($tags[$keys[$n]]); $i++) {
                        if (stristr($name, $tags[$keys[$n]][$i]) != false) {
                            return $keys[$n];
                        }
                    }
                }
            }
        }

        return '';
    }

    /**
     * 更新ENV文件的键值
     * @param array $data
     */
    public static function setEnv(array $data)
    {
        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';
        $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));
        $contentArray->transform(function ($item) use ($data) {
            foreach ($data as $key => $value) {
                if (str_contains($item, $key)) {
                    return $key . '=' . $value;
                }
            }
            return $item;
        });
        $content = implode("\n", $contentArray->toArray());
        File::put($envPath, $content);
    }

    /**
     * 构造WebSSH连接字符串
     * @param $host
     * @param $port
     * @param $username
     * @param $password
     * @return string
     */
    public static function getSSHBaseUrl($host, $port, $username, $password): string
    {
        return "http://127.0.0.1:8222/?hostname=$host&port=$port&username=$username&password=$password";
    }

    /**
     * 物品id换取物品名称
     * @param $item
     * @param $item_id
     * @return string
     */
    public static function itemIdToItemName($item, $item_id): string
    {
        $item_record = self::getItemRecordByClass($item, $item_id);
        if (empty($item_record)) {
            return '失踪了';
        } else {
            return $item_record->name;
        }
    }

    /**
     * 通过类名获取对应物资的模型
     * @param $item
     * @param $item_id
     * @return null
     */
    public static function getItemRecordByClass($item, $item_id)
    {
        $item_record = null;
        switch ($item) {
            case 'part':
                $class = 'Celaraze\\Chemex\\Part\\Models\\PartRecord';
                if (class_exists($class)) {
                    $item_record = $class::where('id', $item_id)->first();
                }
                break;
            case 'software':
                $class = 'Celaraze\\Chemex\\Software\\Models\\SoftwareRecord';
                if (class_exists($class)) {
                    $item_record = $class::where('id', $item_id)->first();
                }
                break;
            default:
                $item_record = DeviceRecord::where('id', $item_id)->first();
        }
        return $item_record;
    }

    /**
     * 获取折旧后的价格
     * @param $price
     * @param $date
     * @param $depreciation_rule_id
     * @return float|int
     */
    public static function depreciationPrice($price, $date, $depreciation_rule_id)
    {
        $depreciation = DepreciationRule::where('id', $depreciation_rule_id)->first();
        if (empty($depreciation)) {
            return $price;
        } else {

            $purchased_timestamp = strtotime($date);
            $now_timestamp = time();

            $diff = $now_timestamp - $purchased_timestamp;
            if ($diff < 0) {
                return $price;
            }

            $data = $depreciation['rules'];

            // 数组过滤器
            $return = array_filter($data, function ($item) use ($diff) {
                switch ($item['scale']) {
                    case 'month':
                        $number = (int)$item['number'] * 24 * 60 * 60 * 30;
                        break;
                    case 'year':
                        $number = (int)$item['number'] * 24 * 60 * 60 * 365;
                        break;
                    default:
                        $number = (int)$item['number'] * 24 * 60 * 60;
                }

                return $diff >= $number;
            });

            if (!empty($return)) {
                array_multisort(array_column($return, 'number'), SORT_DESC, $return);
                $price = $price * (double)$return[0]['ratio'];
            }
            return $price;
        }
    }

    /**
     * 根据模型查找折旧规则的id（记录的优先级>分类的优先级）
     * @param Model $model
     * @return mixed|null
     */
    public static function getDepreciationRuleId(Model $model)
    {
        $depreciation_rule_id = null;
        if (empty($model->depreciation_rule_id)) {
            $category = null;
            if ($model instanceof DeviceRecord) {
                $category = DeviceCategory::where('id', $model->category_id)->first();
            }
            $part_record_class = 'Celaraze\\Chemex\\Part\\Models\\PartRecord';
            $part_category_class = 'Celaraze\\Chemex\\Part\\Models\\PartCategory';
            if (class_exists($part_record_class) && $model instanceof $part_record_class) {
                $category = $part_category_class::where('id', $model->category_id)->first();
            }
            if (!empty($category) && !empty($category->depreciation_rule_id)) {
                $depreciation_rule_id = $category->depreciation_rule_id;
            }
        } else {
            $depreciation_rule_id = $model->depreciation_rule_id;
        }

        return $depreciation_rule_id;
    }

    public static function extensionStatus($service_provider)
    {
        return admin_extension_setting($service_provider);
    }

    /**
     * 判断是否切换到selectCreate
     * @return bool
     */
    public static function ifSelectCreate(): bool
    {
        if (admin_setting('switch_to_select_create') && Admin::extension()->enabled('celaraze.dcat-extension-plus')) {
            return true;
        } else {
            return false;
        }
    }
}
