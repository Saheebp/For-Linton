<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Designation;
use App\Models\Department;
use App\Models\State;
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
                'name' => 'Disabled',
                'style' => 'secondary'
            ],
            [
                'name' => 'Accepted',
                'style' => 'success'
            ],
            [
                'name' => 'Open',
                'style' => 'success'
            ],
            [
                'name' => 'Closed',
                'style' => 'dark'
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
            ],
            [
                'name' => 'Out of Funds',
                'style' => 'danger'
            ],
            [
                'name' => 'Active',
                'style' => 'success'
            ],
            [
                'name' => 'Inactive',
                'style' => 'danger'
            ],
            [
                'name' => 'Read',
                'style' => 'success'
            ],
            [
                'name' => 'Unread',
                'style' => 'warning'
            ],
            [
                'name' => 'Returned',
                'style' => 'danger'
            ],
            [
                'name' => 'Approved',
                'style' => 'success'
            ],
            [
                'name' => 'Declined',
                'style' => 'danger'
            ],
            [
                'name' => 'Updated',
                'style' => 'success'
            ],
            [
                'name' => 'Not Updated',
                'style' => 'secondary'
            ]
        ];

        foreach ($statuses as $status) {
            # code...
            Status::create([
                'name' => $status['name'],
                'style' => $status['style']
            ]);
        }

        $states = [
            ['name' => 'Abuja'],
            ['name' => 'Abia'],
            ['name' => 'Adamawa'],
            ['name' => 'Akwa Ibom'],
            ['name' => 'Anambra'],
            ['name' => 'Bauchi'],
            ['name' => 'Bayelsa'],
            ['name' => 'Benue'],
            ['name' => 'Borno'],
            ['name' => 'Cross River'],
            ['name' => 'Delta'],
            ['name' => 'Ebonyi'],
            ['name' => 'Edo'],
            ['name' => 'Ekiti'],
            ['name' => 'Enugu'],
            ['name' => 'Gombe'],
            ['name' => 'Imo'],
            ['name' => 'Jigawa'],
            ['name' => 'Kaduna'],
            ['name' => 'Kano'],
            ['name' => 'Katsina'],
            ['name' => 'Kebbi'],
            ['name' => 'Kogi'],
            ['name' => 'Kwara'],
            ['name' => 'Lagos'],
            ['name' => 'Nassarawa'],
            ['name' => 'Niger'],
            ['name' => 'Ogun'],
            ['name' => 'Ondo'],
            ['name' => 'Osun'],
            ['name' => 'Oyo'],
            ['name' => 'Plateau'],
            ['name' => 'Rivers'],
            ['name' => 'Sokoto'],
            ['name' => 'Taraba'],
            ['name' => 'Yobe'],
            ['name' => 'Zamfara'],
        ];

        foreach ($states as $state) {
            # code...
            State::create([
                'name' => $state['name']
            ]);
        }

        
        $designations = [
            ['name' => 'Managing Director'],
            ['name' => 'HR'],
            ['name' => 'Architect'],
            ['name' => 'Asst Architect'],
            ['name' => 'Quantity Surveyor'],
            ['name' => 'Accountant'],
            ['name' => 'Engineer'],
            ['name' => 'Store keeper'],
        ];

        foreach ($designations as $designation) {
            # code...
            Designation::create([
                'name' => $designation['name']
            ]);
        }

        $departments = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Procurement'
            ],
            [
                'name' => 'Store'
            ],
            [
                'name' => 'Human Resource'
            ]
        ];

        foreach ($departments as $department) {
            # code...
            Department::create([
                'name' => $department['name']
            ]);
        }

    }
}
