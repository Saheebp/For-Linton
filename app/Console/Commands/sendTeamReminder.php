<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class sendTeamReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:Reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder to team members';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try
        { 
            $time = 2880;
            
            $tasks = Task::where('status_id', $this->returnStatusId("Pending"))
            ->where('created_at', '<', Carbon::now()->subMinutes($time)->toDateTimeString())
            ->get();

            foreach($tasks as $task)
            {
                $details = [
                    'title' => 'Reminder on Pending Task '.$task->name,
                    'header' => $data['header'] ?? '',
                    'body' => $data['body'] ?? '',
                    'footer' => $data['footer'] ?? ''
                ];

                foreach($task->members as $member)
                {
                    $email = $member->email;
                    \Mail::to($email)->send(new \App\Mail\AppMail($details));
                }
                
                activity()
                ->performedOn($tasks)
                ->causedBy(auth()->user())
                ->withProperties(['Client' => $task->name])
                ->log('Reminder on task: '.$task->id.' has been sent');
            }

            $tasks = SubTask::where('status_id', $this->returnStatusId("Pending"))
            ->where('created_at', '<', Carbon::now()->subMinutes($time)->toDateTimeString())
            ->get();

            foreach($tasks as $task)
            {
                $details = [
                    'title' => 'Reminder on Pending Task '.$task->name,
                    'header' => $data['header'] ?? '',
                    'body' => $data['body'] ?? '',
                    'footer' => $data['footer'] ?? ''
                ];

                foreach($task->members as $member)
                {
                    $email = $member->email;
                    \Mail::to($email)->send(new \App\Mail\AppMail($details));
                }
                
                activity()
                ->performedOn($tasks)
                ->causedBy(auth()->user())
                ->withProperties(['Client' => $task->name])
                ->log('Reminder on task: '.$task->id.' has been sent');
            }
        } 
        catch (\Exception $e) 
        { 
            //$this->createErrorReport(NULL, 'Send Reminder', $e->getMessage()." on line ".$e->getLine());
            \Log::info($e->getMessage());
            \Log::info('Reminder could not be sent');
        }
    }
}
