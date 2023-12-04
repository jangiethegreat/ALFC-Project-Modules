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
        Schema::create('qoutations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quotation_id');
            $table->foreignId('computation_rate_id')->constrained('provider_products');
            $table->decimal('insured_limit', 20, 9);
            $table->decimal('insured_rate', 20, 9);
            $table->decimal('insured_premium_rate', 20, 9);
            $table->decimal('provider_premium_due', 20, 9);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qoutations');
    }
};
