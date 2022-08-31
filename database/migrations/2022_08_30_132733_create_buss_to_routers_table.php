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
        Schema::create('buss_to_routers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agence_id');
            $table->unsignedBigInteger('buss_id');
            $table->unsignedBigInteger('router_id');
            $table->foreign('agence_id')->references('id')->on('users')
                                         ->onUpdate('cascade')
                                         ->ondelete('cascade');
                                         $table->unsignedBigInteger('agence_id');
            $table->foreign('buss_id')->references('id')->on('busses')
                                         ->onUpdate('cascade')
                                         ->ondelete('cascade');
            $table->foreign('router_id')->references('id')->on('routers')
                                         ->onUpdate('cascade')
                                         ->ondelete('cascade');
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
        Schema::dropIfExists('buss_to_routers');
    }
};
