<?php

namespace App\Observers;

use App\Models\CustomColumn;
use Exception;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CustomFieldObserver
{
    /**
     * Handle the CustomColumn "created" event.
     *
     * @param CustomColumn $customField
     * @return void
     */
    public function created(CustomColumn $customField)
    {
        try {
            Schema::table($customField->table_name, function (Blueprint $table) use ($customField) {
                $type = $customField->type;
                if ($customField->is_nullable == 0) {
                    $nullable = false;
                } else {
                    $nullable = true;
                }
                if ($type == 'date' || $type == 'dateTime') {
                    $nullable = true;
                }
                $table->$type($customField->name)->nullable($nullable);
            });
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    /**
     * Handle the CustomColumn "updated" event.
     *
     * @param CustomColumn $customField
     * @return void
     */
    public function updated(CustomColumn $customField)
    {
        //
    }

    /**
     * Handle the CustomColumn "deleted" event.
     *
     * @param CustomColumn $customField
     * @return void
     */
    public function deleted(CustomColumn $customField)
    {
        try {
            Schema::table($customField->table_name, function (Blueprint $table) use ($customField) {
                $table->dropColumn($customField->name);
            });
        } catch (Exception $exception) {
            DB::rollBack();
        }
    }

    /**
     * Handle the CustomColumn "restored" event.
     *
     * @param CustomColumn $customField
     * @return void
     */
    public function restored(CustomColumn $customField)
    {
        //
    }

    /**
     * Handle the CustomColumn "force deleted" event.
     *
     * @param CustomColumn $customField
     * @return void
     */
    public function forceDeleted(CustomColumn $customField)
    {
        //
    }
}
