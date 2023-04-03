<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class ProductGroupItems extends Seeder
{

    public function run()
    {
        $product_groups = [
            ['group_id'=>'1','product_id'=>'2'],
            ['group_id'=>'1','product_id'=>'5'],
        ];
        foreach ($product_groups as $prod){
            \App\Models\ProductGroupItems::create($prod);
        }
    }
}
