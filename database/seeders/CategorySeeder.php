<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            [
                'name' => 'Fruits',
                'description'  => 'All Fruits'
            ],
            [
                'name' => 'Vegetables',
                'description'  => 'All Vegetables'
            ],
            [
                'name' => 'Grains',
                'description'  => 'All Grains'
            ]
        ];


        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
