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
        Schema::create('matrices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('code',100)->nullable();
            $table->string('title',100)->nullable();
            $table->text('unit_descriptor')->nullable();
            $table->text('elements')->nullable();
            $table->text('relevent_experiance')->nullable();
            $table->text('relevent_qualification')->nullable();
            $table->enum('is_hold', ['Y', 'N']);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('matrices');
    }
};
