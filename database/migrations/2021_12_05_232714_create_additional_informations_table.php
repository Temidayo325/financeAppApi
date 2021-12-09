<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_informations', function (Blueprint $table) {
            $table->id();
            $table->string("user_token");
            $table->foreign('user_token')->references('user_token')->on('users');
            $table->string("occupation")->nullable();
            $table->string("age")->nullable();
            $table->string("income")->nullable();
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
        Schema::dropIfExists('additional_informations');
    }
}
