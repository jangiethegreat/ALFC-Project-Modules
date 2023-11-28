<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_computation_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_category_id')->constrained('provider_categories');
            $table->foreignId('insurance_coverage_id')->constrained('insurance_coverages');
            $table->decimal('set_limit');
            $table->decimal('set_rate');
            $table->decimal('provider_net_limit');
            $table->decimal('provider_net_rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_computation_rates');
    }
};
