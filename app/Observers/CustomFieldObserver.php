<?php

namespace App\Observers;

use App\Models\CustomField;
use Exception;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CustomFieldObserver
{
    /**
     * Handle the CustomField "created" event.
     *
     * @param CustomField $customField
     * @return void
     */
    public function created(CustomField $customField)
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
     * Handle the CustomField "updated" event.
     *
     * @param CustomField $customField
     * @return void
     */
    public function updated(CustomField $customField)
    {
        //
    }

    /**
     * Handle the CustomField "deleted" event.
     *
     * @param CustomField $customField
     * @return void
     */
    public function deleted(CustomField $customField)
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
     * Handle the CustomField "restored" event.
     *
     * @param CustomField $customField
     * @return void
     */
    public function restored(CustomField $customField)
    {
        //
    }

    /**
     * Handle the CustomField "force deleted" event.
     *
     * @param CustomField $customField
     * @return void
     */
    public function forceDeleted(CustomField $customField)
    {
        //
    }
}
