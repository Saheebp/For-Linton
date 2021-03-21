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
                'name' => 'Paid', //1
                'style' => 'success'
            ],
            [
                'name' => 'Pending',//2
                'style' => 'warning'
            ],
            [
                'name' => 'Cancelled',//3
                'style' => 'danger'
            ],
            [
                'name' => 'In Progress',//4
                'style' => 'success'
            ],
            [
                'name' => 'Queried',//5
                'style' => 'danger'
            ],
            [
                'name' => 'Completed',//6
                'style' => 'success'
            ],
            [
                'name' => 'New',//7
                'style' => 'success'
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
                'name' => 'Unavailable',//10
                'style' => 'warning'
            ],
            [
                'name' => 'Available',//11
                'style' => 'success'
            ],
            [
                'name' => 'Admin',//12
                'style' => 'success'
            ],

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
