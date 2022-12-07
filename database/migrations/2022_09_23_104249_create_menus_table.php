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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->nullable();
            $table->string('link',100)->nullable();
            $table->string('icon',200)->nullable();
            $table->string('position',100)->nullable();
            $table->string('link_open_in',100)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('ordering')->default(0);
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
        Schema::dropIfExists('menus');
    }
};
