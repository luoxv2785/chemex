<?php


namespace Celaraze\Chemex\Todo;


class Support
{
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
