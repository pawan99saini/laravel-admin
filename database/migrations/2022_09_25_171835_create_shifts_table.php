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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->time('shift_name');
            $table->time('min_start_time');
            $table->time('start_time');
            $table->time('max_start_time');
            $table->time('min_end_time');
            $table->time('end_time');
            $table->time('max_end_time');
            $table->time('break_time');
            $table->tinyInteger('recurring_shift');
            $table->tinyInteger('repeat');
            $table->string('week')->nullable();
            $table->date('end_date');
            $table->tinyInteger('indefinite');
            $table->text('tag')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('shifts');
    }
};
