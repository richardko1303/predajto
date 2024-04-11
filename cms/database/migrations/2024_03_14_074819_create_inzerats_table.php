<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInzeratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inzerats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_category_id');
            $table->foreignId('user_id')->nullable();

            $table->string('title');
            $table->text('description')->nullable();
            $table->text('important_info')->nullable();
            $table->double('price');

            $table->string('location');

            $table->string('email');
            $table->string('phone');


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
        Schema::dropIfExists('inzerats');
    }
}
