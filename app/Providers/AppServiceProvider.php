<?php

namespace App\Providers;

use App\Models\CheckRecord;
use App\Models\CustomColumn;
use App\Models\TodoRecord;
use App\Observers\CheckRecordObserver;
use App\Observers\CustomColumnObserver;
use App\Observers\TodoRecordObserver;
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
        TodoRecord::observe(TodoRecordObserver::class);

        CustomColumn::observe(CustomColumnObserver::class);
    }
}
