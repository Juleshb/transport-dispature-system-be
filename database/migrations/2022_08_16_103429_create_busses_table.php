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
        Schema::create('busses', function (Blueprint $table) {
            $table->id();
            $table->string('buss-name');
            $table->string('driver-name');
            $table->string('buss-code');
            $table->unsignedBigInteger('agence_id');
            $table->foreign('agence_id')->references('id')->on('users')
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
        Schema::dropIfExists('busses');
    }
};
