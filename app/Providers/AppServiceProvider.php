<?php

namespace App\Providers;

use App\Models\CheckRecord;
use App\Observers\CheckRecordObserver;
use Dcat\Admin\Admin;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // 盘点任务的观察者
        CheckRecord::observe(CheckRecordObserver::class);
        // 待办的观察者
        if (Admin::extension()->enabled('celaraze.chemex-todo')) {
            $todo_record_model = "Celaraze\\Chemex\\Todo\\Models\\TodoRecord";
            $observer = "Celaraze\\Chemex\\Todo\\Observers\\TodoRecordObserver";
            $todo_record_model::observe($observer);
        }
    }
}
