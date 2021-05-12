<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Paid',
                'style' => 'success'
            ],
            [
                'name' => 'Unpaid',
                'style' => 'dark'
            ],
            [
                'name' => 'Declined',
                'style' => 'secondary'
            ],



            [
                'name' => 'New',
                'style' => 'primary'
            ],
            [
                'name' => 'In Progress',
                'style' => 'success'
            ],
            [
                'name' => 'Pending',
                'style' => 'warning'
            ],
            [
                'name' => 'Completed',//6
                'style' => 'success'
            ],
            [
                'name' => 'Cancelled',//3
                'style' => 'danger'
            ],
            [
                'name' => 'Overdue',
                'style' => 'danger'
            ],
            [
                'name' => 'Queried',//5
                'style' => 'danger'
            ],
            
            
            [
                'name' => 'Gold',//8
                'style' => 'success'
            ],
            [
                'name' => 'Premium',//9
                'style' => 'success'
            ],
            [
                'name' => 'Unavailable',
                'style' => 'warning'
            ],
            [
                'name' => 'Available',
                'style' => 'success'
            ]

            ,
            [
                'name' => 'Out of Funds',
                'style' => 'danger'
            ]

        ];

        foreach ($statuses as $status) {
            # code...
            Status::create([
                'name' => $status['name'],
                'style' => $status['style']
            ]);
        }
    }
}
