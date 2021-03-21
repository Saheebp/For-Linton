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
                'amount'  => '2000',
            ],
            [
                'category_id' => '3',
                'brand_id' => '1',
                'name' => 'Rice',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '1500',
            ],
            [
                'category_id' => '2',
                'brand_id' => '1',
                'name' => 'Sesame Seeds',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '1000',
            ],
            [
                'category_id' => '1',
                'brand_id' => '1',
                'name' => 'Strawberries',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '500',
            ],
            [
                'category_id' => '3',
                'brand_id' => '1',
                'name' => 'Lemons',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '950',
            ],
            [
                'category_id' => '2',
                'brand_id' => '1',
                'name' => 'Yams',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '4000',
            ],
            [
                'category_id' => '1',
                'brand_id' => '1',
                'name' => 'Grapes',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '1000',
            ],
            [
                'category_id' => '3',
                'brand_id' => '1',
                'name' => 'Cabbage',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '1000',
            ],
            [
                'category_id' => '2',
                'brand_id' => '1',
                'name' => 'Sweet Potatoes',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '6000',
            ],
            [
                'category_id' => '1',
                'brand_id' => '1',
                'name' => 'Red Grapes',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '1000',
            ],
            [
                'category_id' => '3',
                'brand_id' => '1',
                'name' => 'Carror',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '1000',
            ],
            [
                'category_id' => '2',
                'brand_id' => '1',
                'name' => 'Mangoes',
                'description'  => 'desc',
                'rating'  => '1',
                'quantity'  => '1',
                'amount'  => '6000',
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
