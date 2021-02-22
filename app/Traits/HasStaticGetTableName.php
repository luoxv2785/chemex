<?php


namespace App\Traits;


trait HasStaticGetTableName
{
    public static function table(): string
    {
        $model = new self();
        return $model->getTable();
    }
}
