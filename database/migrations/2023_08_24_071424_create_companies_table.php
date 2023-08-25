<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ticker');
            $table->string('country');
            $table->string('sector');
            $table->string('industry');
            $table->decimal('market_cap', 15, 2);
            $table->string('average_analyst_rating');
            $table->float('regular_market_price');            
            $table->float('one_year_target');
            $table->float('one_year_lowest');
            $table->float('one_year_highest');
            $table->float('volatility'); //beta
            $table->float('EPS');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
