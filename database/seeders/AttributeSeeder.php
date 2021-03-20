<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $attributes = [
            [
                'name' => 'Size',
                'description'  => ''
            ],
            [
                'name' => 'Sizing',
                'description'  => ''
            ],
            [
                'name' => 'Color',
                'description'  => ''
            ],
            [
                'name' => 'Dimension',
                'description'  => ''
            ]
        ];


        foreach ($attributes as $attribute) {
            Attribute::create($attribute);
        }
    }
}
