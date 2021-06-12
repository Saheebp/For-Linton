<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Inventory;
use App\Models\RequestFq;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = Project::create([

            'name' => 'Reconstruction of Bungalow',
            'description' => 'Reconstruction of 3 bedroom Bungalow for Special Assistant to the Govenor',
            'objective' => 'Renovation and reconstruction',
            'start' => Carbon::now(),
            'end' => Carbon::now()->addMonths(3),
            
            'nature' => 'Construction',
            'type' => 'Short Term',
            'funding_source' => 'Ministry of Housing',
            'budget' => 120000000,

            'sponsor_name' => 'Ministry of Housing',
            'sponsor_email' => 'mhud@gov.ng',
            'sponsor_phone' => '09099900099',

            'state' => 'Plateau',
            'lga' => 'Jos-South',
            'address' => 'Rayfeild Yingi Road',
            
            'manager_id' => 8,
            'creator_id' => 2,
            'status_id' => 6
        ]);

        Inventory::create([
            'name' => 'INV Reconstruction/Platau 2',
            'description' => 'Inventory for Reconstruction of 3 bedroom Bungalow for Special Assistant to the Govenor',
            'project_id' => $project->id,
            'status_id' => 4,
        ]);

        RequestFq::create([
            'name' => 'Purchase of Equipment',
            'subject' => 'Purchases',
            'description' => 'Purchases of stationarys and office equipment',
            'start' => Carbon::now(),
            'end' => Carbon::now()->addDays(3),
            'user_id' => 1,
            'department_id' => 1,
            'status_id' => 9,
            'total_cost' => 5000000
        ]);

        RequestFq::create([
            'name' => 'Purchase of Vehicles',
            'subject' => 'Purchases',
            'description' => 'Purchases of SUVs and Hilux Vans',
            'start' => Carbon::now(),
            'end' => Carbon::now()->addDays(3),
            'user_id' => 1,
            'department_id' => 1,
            'status_id' => 9,
            'total_cost' => 1000000
        ]);
    }
}
