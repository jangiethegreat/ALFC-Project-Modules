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
        Schema::create('insurance_computations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_product_id')->constrained('provider_products');
            $table->foreignId('insurance_coverage_id')->constrained('insurance_coverages');
            $table->decimal('set_limit', 20, 9);
            $table->decimal('set_rate', 20, 9);
            $table->decimal('provider_net_limit', 20, 9);
            $table->decimal('provider_net_rate', 20, 9);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_computations');
    }
};
