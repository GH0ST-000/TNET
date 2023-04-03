<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('product_group_items', function (Blueprint $table) {
            $table->id('item_id');
            $table->foreignId('group_id')->references('group_id')->on('user_product_groups');
            $table->foreignId('product_id')->references('product_id')->on('products');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_group_items');
    }
};
