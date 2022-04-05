<?php

namespace App\Imports;

use App\Models\Project;
use App\Models\Task;
use App\Models\SubTask;
use App\Models\GrandTask;
use App\Models\GreatTask;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Session;

class PowImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $project_id = Session::get('project_id');
        $project = Project::find($project_id);
        
        //starting from row 2 to get straight to data
        for ($i = 2; $i < count($rows); $i++)
        {
            $row = $rows[$i];

            //convert date from excel format to Y-m-d
            $start = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5])->format('Y-m-d');
            $end = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6])->format('Y-m-d');

            //predecessor
            $predecessor = $row[7];

            //extract name
            $name = explode(" ", $row[3])[1];

            //extract id's
            $ids = explode(" ", $row[3])[0];

            $params = [
                'name' => $name,
                'order' => null, 
                'description' => $name, 
                'budget' => null,
                'start' => $start, 
                'end' => $end,
                'project_id' => $project_id,
                'task_id' => null,
                'sub_task_id' => null,
                'grand_task_id' => null,
                'great_task_id' => null,
                'preceedby' => $predecessor, 
                'succeedby' => null
            ];

            //a. seperate everything by '.'
            $parts = explode(".", $ids);

            //b.find array size to get number of parts
            $noofparts = count($parts);
            
            //e.g 1.0
            if($noofparts == 2 && $parts[1] == 0)
            {
                //create task
                $params['task_id'] = $project_id.$parts[0];
                
                Task::unguard();
                $task = Task::create([
                    'id' => $params['task_id'],
                    'name' => $params['name'], 
                    'order' => $params['order'],
                    'description' => $params['description'],
                    'start' => $params['start'], 
                    'end' => $params['end'],
                    'project_id' => $params['project_id'],
                    'status_id' => config('pending'),

                    'preceedby' => $params['preceedby'],
                    'succeedby' => $params['succeedby'],
                    // 'budget' => null,
                    // 'actual_cost' => null,
                    // 'group_id' => null,
                ]);
                Task::reguard();
                $task->save();
            }
            
            //e.g 1.1
            elseif($noofparts == 2 && $parts[1] != 0)
            {
                //create substask
                $params['task_id'] = $project_id.$parts[0];
                $params['sub_task_id'] = $params['task_id'].$parts[1];

                SubTask::unguard();
                $subtask = SubTask::create([
                    
                    'id' => $params['sub_task_id'],
                    'name' => $params['name'], 
                    'order' => $params['order'],
                    'description' => $params['description'],
                    'start' => $params['start'], 
                    'end' => $params['end'],
                    'project_id' => $params['project_id'],
                    'task_id' => $params['task_id'],
                    'status_id' => config('pending'),
                    'preceedby' => $params['preceedby'],
                    'succeedby' => $params['succeedby'],
                    // 'budget' => $params['budget'],
                    // 'actual_cost' => null,
                ]);
                SubTask::reguard();
            }

            //e.g 1.1.1
            elseif($noofparts == 3 && $parts[1] != 0 && $parts[2] != 0)
            {
                //create grand task
                $params['task_id'] = $project_id.$parts[0];
                $params['sub_task_id'] = $params['task_id'].$parts[1];
                $params['grand_task_id'] = $params['sub_task_id'].$parts[2];

                GrandTask::unguard();
                $subsubtask = GrandTask::create([
                    
                    'id' => $params['grand_task_id'],
                    'name' => $params['name'], 
                    'order' => $params['order'],
                    'description' => $params['description'],
                    'start' => $params['start'], 
                    'end' => $params['end'],
                    'project_id' => $params['project_id'],
                    'task_id' => $params['task_id'],
                    'sub_task_id' => $params['sub_task_id'],
                    'status_id' => config('pending'),

                    'preceedby' => $params['preceedby'],
                    'succeedby' => $params['succeedby'],
                    // 'budget' => $params['budget'],
                    // 'actual_cost' => null,
                ]);
                GrandTask::reguard();
            }

            //e.g 1.1.1.1
            elseif($noofparts == 4 && $parts[1] != 0 && $parts[2] != 0 && $parts[3] != 0)
            {
                //create great task
                $params['task_id'] = $project_id.$parts[0];
                $params['sub_task_id'] = $params['task_id'].$parts[1];
                $params['grand_task_id'] = $params['sub_task_id'].$parts[2];
                $params['great_task_id'] = $params['grand_task_id'].$parts[3];

                GreatTask::unguard();
                $greatask = GreatTask::create([

                    'id' => $params['great_task_id'],
                    'name' => $params['name'], 
                    'order' => $params['order'],
                    'description' => $params['description'],
                    
                    'start' => $params['start'], 
                    'end' => $params['end'],
                    
                    'project_id' => $params['project_id'],
                    'task_id' => $params['task_id'],
                    'sub_task_id' => $params['sub_task_id'],
                    'grand_task_id' => $params['grand_task_id'],
                    'status_id' => config('pending'),
                    
                    'preceedby' => $params['preceedby'],
                    'succeedby' => $params['succeedby'],
                    // 'budget' => $params['budget'],
                    // 'actual_cost' => null,
                ]);
                GreatTask::reguard();
            }
        }
    }
}
