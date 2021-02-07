<?php


namespace App\Traits;


trait HasExtendedFields
{
    /**
     * 对自定义信息字段读取做数据类型转换，json字符串解析为数组
     * @param $fields
     * @return array
     */
    public function getExtendedFieldsAttribute($fields): array
    {
        return array_values(json_decode($fields, true) ?: []);
    }

    /**
     * 对自定义信息字段写入做数据类型转换，数组转为json字符串
     * @param $fields
     */
    public function setExtendedFieldsAttribute($fields)
    {
        $this->attributes['extended_fields'] = json_encode(array_values($fields));
    }
}
