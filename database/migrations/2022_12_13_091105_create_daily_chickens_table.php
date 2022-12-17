<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyChickensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_chickens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chicken_id')->constrained();
            $table->date('date')->nullable();
            $table->float('feed_consumption',8,2)->nullable();
            $table->float('fcr',8,2)->nullable();
            $table->float('weight1',8,2)->nullable();
            $table->float('weight2',8,2)->nullable();
            $table->float('weight3',8,2)->nullable();
            $table->float('weight4',8,2)->nullable();
            $table->float('weight_avg',8,2)->nullable();
            $table->integer('mortality')->nullable();
            $table->integer('rejection')->nullable();
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
        Schema::dropIfExists('daily_chickens');
    }
}