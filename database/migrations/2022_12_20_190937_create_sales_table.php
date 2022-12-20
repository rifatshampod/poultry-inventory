<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farm_id')->constrained();
            $table->foreignId('house_id')->constrained();
            $table->date('date')->nullable();
            $table->integer('total_birds')->nullable();
            $table->float('total_weight',8,2)->nullable();
            $table->float('avg_weight',8,2)->nullable();
            $table->float('total_price',8,2)->nullable();
            $table->float('avg_price',8,2)->nullable();
            $table->float('per_kg_price',8,2)->nullable();
            $table->string('customer')->nullable();
            $table->string('car_no')->nullable();
            $table->string('catching_slip')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('branch')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('sales');
    }
}