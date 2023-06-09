<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('product_id')->references('product_id')->on('products');
            $table->string('quantity')->default('1');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
