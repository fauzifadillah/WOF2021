<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReedemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reedems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vouchers_id')->references('id')->on('vouchers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('code');
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
        Schema::dropIfExists('reedems');
    }
}
