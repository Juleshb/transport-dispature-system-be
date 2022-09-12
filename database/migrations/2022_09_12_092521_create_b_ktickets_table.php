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
        Schema::create('b_ktickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('router_id');
            $table->unsignedBigInteger('buss_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')->references('id')
            ->on('agences')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('router_id')->references('id')
            ->on('routers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('buss_id')->references('id')
            ->on('busses')->onDelete('cascade')->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('b_ktickets');
    }
};
