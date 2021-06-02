<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\WarehouseItem;
use App\Models\Batch;

use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Equipment',
                'description' => 'Site equipment'
            ],
            [
                'name' => 'Disposables',
                'description' => 'Site disposables'
            ],
            [
                'name' => 'Building Materials',
                'description' => 'Site Tools'
            ],
            [
                'name' => 'Disposables',
                'description' => 'Site disposables'
            ]
        ];

        foreach ($categories as $item) {
            # code...
            Category::create([
                'name' => $item['name'],
                'description' => $item['description']
            ]);
        }

        $batches = [
            [
                'name' => 'A121',
            ],
            [
                'name' => 'A131'
            ],
            [
                'name' => 'A141'
            ],
            [
                'name' => 'A151'
            ]
        ];

        foreach ($batches as $batch) {
            # code...
            Batch::create([
                'name' => $batch['name']
            ]);
        }

        $items = [
            [
                'name' => 'Cement',
                'quantity' => 1000, 
                'available' => 100, 
                'threshold' => 100,
                'created_by' => 1,
                'batch_id' => 1,
                'image' => '',
                'status_id' => 14,
                'category_id' => 2,
                'inventory_id' => NULL
            ],
            [
                'name' => 'Wheel Barrows',
                'quantity' => 1000, 
                'available' => 100, 
                'threshold' => 100,
                'created_by' => 1,
                'batch_id' => 1,
                'image' => '',
                'status_id' => 14,
                'category_id' => 1,
                'inventory_id' => NULL
            ],
            [
                'name' => 'Blocks',
                'quantity' => 1000, 
                'available' => 100, 
                'threshold' => 100,
                'created_by' => 1,
                'batch_id' => 1,
                'image' => '',
                'status_id' => 14,
                'category_id' => 2,
                'inventory_id' => NULL
            ],
            [
                'name' => 'Toyota Hilux Vans',
                'quantity' => 100, 
                'available' => 100, 
                'threshold' => 10,
                'created_by' => 1,
                'batch_id' => 1,
                'image' => '',
                'status_id' => 14,
                'category_id' => 4,
                'inventory_id' => NULL
            ]
        ];
        foreach ($items as $item) {
            # code...
            WarehouseItem::create([
                'name' => $item['name'],
                'quantity' => $item['quantity'],
                'available' => $item['quantity'],
                'threshold' => $item['threshold'],
                'created_by' => $item['created_by'],
                'batch_id' => $item['batch_id'],
                'image' => $item['image'],
                'status_id' => $item['status_id'],
                'category_id' => $item['category_id'],
                'inventory_id' => $item['inventory_id']
            ]);
        }
    }
}
