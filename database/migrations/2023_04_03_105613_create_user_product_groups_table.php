<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('user_product_groups', function (Blueprint $table) {
            $table->id('group_id');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('discount');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_product_groups');
    }
};
