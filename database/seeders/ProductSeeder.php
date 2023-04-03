<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {

        $product = [
            ['user_id'=>'1','title'=>'Product 1 Title','price'=>10],
            ['user_id'=>'1','title'=>'Product 2 Title','price'=>11],
            ['user_id'=>'1','title'=>'Product 3 Title','price'=>12],
            ['user_id'=>'1','title'=>'Product 4 Title','price'=>13],
            ['user_id'=>'1','title'=>'Product 5 Title','price'=>14],
            ['user_id'=>'1','title'=>'Product 6 Title','price'=>15],
        ];

        foreach ($product as  $value) {
            Product::create($value);
        }
    }
}
