<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Notification;
use App\Models\Status;
use App\Models\Log;
use App\Models\User;

use App\Models\ErrorReport;

use App\Mail\TestEmail;

use Illuminate\Http\Request;

use Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        
    }

    // function returnStatusId($status)
    // {
    //     try {
    //         $status_id = Status::where('name',$status)->first()->id;
    //         return $status_id; 
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //     }        
    // }

    function CreateNotification(array $data)
    { 
        try 
        {
            $notification = Notification::create([
                'body' => $data['body'], 
                // 'tag' => $data['tag'],
                'status_id' => config('pending'),

                'project_id' => $data['project_id'] ?? NULL,
                'task_id' => $data['task_id'] ?? NULL,
                'sub_task_id' => $data['sub_task_id'] ?? NULL,
                'grand_task_id' => $data['grand_task_id'] ?? NULL,
                'great_task_id' => $data['great_task_id'] ?? NULL,
                'user_id' => $data['user_id'] ?? NULL,

                'resource_id' => $data['resource_id'] ?? NULL,
                'request_fq_id' => $data['request_fq_id'] ?? NULL,
                'quote_id' => $data['quote_id'] ?? NULL,
                'payment_id' => $data['payment_id'] ?? NULL
            ]);

            $user = User::find($data['user_id']);
            $details = [
                'title' => 'Notification from Project Manager',
                'header' => $data['header'] ?? '',
                'body' => $data['body'] ?? '',
                'action' => $data['action'] ?? 'false',
                'button' => $data['button'] ?? null,
                'footer' => $data['footer'] ?? null
            ];

            
            //\Mail::to($data['emails'])->send(new \App\Mail\AppMail($details));
            //\Mail::to('ibennamdik@gmail.com')->send(new \App\Mail\AppMail($details));
            //dd($data['emails']);

            if ($data['emails'] != null) {
                foreach ($data['emails'] as $email) {
                    $statusreport = \Mail::to($email)->send(new \App\Mail\AppMail($details));
                }
            }

            //send sms with booking status 
            // $receiver = $user->phone;
            // $sender = "PManager";
            // $message = $details['body'] ?? '';
            // $this->sendsms($receiver, $sender, $message);
            
            //\Mail::to('nasirusadiq071@gmail.com')->send(new \App\Mail\AppMail($details));
            //\Mail::to($user->email)->send(new \App\Mail\AppMail($details));

            return true;
        }
        catch (\Exception $e) 
        {
            //dd($e->getMessage()." on line ".$e->getLine());
            $this->createErrorReport(auth()->user()->id, 'Emails', $e->getMessage());
            return false;
        }

    }

    function createErrorReport($user_id, $source, $description)
    {
        ErrorReport::create([
            'source' => $source,
            'user_id' => $user_id,
            'description' => $description,
        ]);      
    }

    function createLog(array $data)
    {
        $log = Log::create([
            'body' => $data['body'] ?? NULL, 
            'project_id' => $data['project_id'] ?? NULL,
            'task_id' => $data['task_id'] ?? NULL,
            'sub_task_id' => $data['sub_task_id'] ?? NULL,
            'grand_task_id' => $data['grand_task_id'] ?? NULL,
            'great_task_id' => $data['great_task_id'] ?? NULL,
            'user_id' => $data['user_id'] ?? NULL,
        ]);
        return true;
    }

    function createUser(array $data)
    {
        $user = User::create([
            'name' => isset($data['name'])? $data['name'] : '', 
            'email' => $data['email'],
            'phone' => $data['phone'],

            // 'nok_name' => isset($data['nok_name'])? $data['nok_name'] : '', 
            // 'nok_phone' => isset($data['nok_phone'])? $data['nok_phone'] : '', 

            'is_admin' => 'false',
            'status_id' => config('active'),
            'password' => Hash::make($data['phone']),
        ]);
        
        $user->assignRole('Level 7');
        return $user;
    }

    function sendEmail(array $data)
    {
        $data = ['message' => 'This is a test!'];
        Mail::to('john@example.com')->send(new TestEmail($data));
    }
}
