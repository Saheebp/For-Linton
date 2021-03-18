<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        //
        $products = [
            [
                'category_id' => '1',
                'brand_id' => '1',
                'name' => 'Strawberries',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '1000',
            ],
            [
                'category_id' => '3',
                'brand_id' => '1',
                'name' => 'Rice',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '1000',
            ],
            [
                'category_id' => '2',
                'brand_id' => '1',
                'name' => 'Cabbage',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '1000',
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
