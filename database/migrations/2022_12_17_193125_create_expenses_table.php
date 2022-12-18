<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farm_id')->constrained();
            $table->foreignId('house_id')->constrained();
            $table->foreignId('flock_id')->constrained();
            $table->date('date')->nullable();
            $table->foreignId('expense_type_id')->constrained();
            $table->foreignId('expense_sector_id')->constrained();
            $table->float('amount',8,2)->nullable();
            $table->integer('paid_from')->nullable();
            $table->string('approver')->nullable();
            $table->string('reference')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}