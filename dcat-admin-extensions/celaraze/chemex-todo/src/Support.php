<?php


namespace Celaraze\Chemex\Todo;


class Support
{
    /**
     * 快速翻译（为了缩短代码量）
     * @param $string
     * @return array|string|null
     */
    public static function trans($string)
    {
        return ServiceProvider::trans($string);
    }

    /**
     * 返回优先级的键值对
     * @return string[]
     */
    public static function priority(): array
    {
        return [
            'high' => '高',
            'normal' => '普通',
            'low' => '低'
        ];
    }
}
