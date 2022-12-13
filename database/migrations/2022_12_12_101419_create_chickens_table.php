<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChickensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chickens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farm_id')->constrained();
            $table->foreignId('house_id')->constrained();
            $table->foreignId('flock_id')->constrained();
            $table->date('date')->nullable();
            $table->integer('sum_of_doc')->nullable();
            $table->string('hatchery')->nullable();
            $table->integer('bird_in_case')->nullable();
            $table->string('vaccine')->nullable();
            $table->float('density',8,2)->nullable();
            $table->date('catching_start')->nullable();
            $table->date('catching_end')->nullable();
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
        Schema::dropIfExists('chickens');
    }
}