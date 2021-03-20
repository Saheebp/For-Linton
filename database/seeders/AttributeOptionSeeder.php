<?php

namespace Database\Seeders;

use App\Models\AttributeOption;
use Illuminate\Database\Seeder;

class AttributeOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $options = [
            [
                'name' => 'XXL',
                'attribute_id'  => 1,
                'value'  => ''
            ],
            [
                'name' => 'XL',
                'attribute_id'  => 1,
                'value'  => ''
            ],
            [
                'name' => 'L',
                'attribute_id'  => 1,
                'value'  => ''
            ],
            [
                'name' => 'M',
                'attribute_id'  => 1,
                'value'  => ''
            ],
            [
                'name' => 'S',
                'attribute_id'  => 1,
                'value'  => ''
            ],


            [
                'name' => 'Big',
                'attribute_id'  => 2,
                'value'  => ''
            ],
            [
                'name' => 'Medium',
                'attribute_id'  => 2,
                'value'  => ''
            ],
            [
                'name' => 'Small',
                'attribute_id'  => 2,
                'value'  => ''
            ],


            [
                'name' => 'Red',
                'attribute_id'  => 3,
                'value'  => ''
            ],
            [
                'name' => 'White',
                'attribute_id'  => 3,
                'value'  => ''
            ],
            [
                'name' => 'Green',
                'attribute_id'  => 3,
                'value'  => ''
            ],
            [
                'name' => 'Black',
                'attribute_id'  => 3,
                'value'  => ''
            ]
        ];

        foreach ($options as $option) {
            AttributeOption::create($option);
        }
    }
}
