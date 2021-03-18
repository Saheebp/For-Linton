<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => 'jsag',
                'description'  => ""
            ],
            [
                'name' => 'local',
                'description'  => ""
            ]
        ];
        
        foreach ($brands as $brand) {
            # 
            Brand::create($brand);
        }
    }
}
