<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Notification;
use App\Models\Status;
use App\Models\Error;
use App\Models\Log;
use App\Models\User;

//traits
use App\Traits\AppConfig;
use App\Traits\AppStatus;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use AppConfig;
    use AppStatus;

    public $paid;
    public $unpaid;
    public $declined;

    public $open;
    public $closed;

    public $new;
    public $in_progress;
    public $pending;
    public $completed;
    public $cancelled;
    public $overdue;
    public $queried;

    public $gold;
    public $premium;

    public $unavailable;
    public $available;

    public $outoffunds;
    public $active;
    public $inactive;

    public $read;
    public $unread;

    public function __construct()
    {
        $this->paid = $this->returnStatusId("Paid");
        $this->unpaid = $this->returnStatusId('Unpaid');
        $this->declined = $this->returnStatusId("Declined");

        $this->open = $this->returnStatusId("open");
        $this->closed = $this->returnStatusId("closed");

        $this->new = $this->returnStatusId("New");
        $this->in_progress = $this->returnStatusId("In Progress");
        $this->pending = $this->returnStatusId("Pending");
        $this->completed = $this->returnStatusId("Completed");
        $this->cancelled = $this->returnStatusId("Cancelled");
        $this->overdue = $this->returnStatusId("Overdue");
        $this->queried = $this->returnStatusId("Queried");
        
        $this->gold = $this->returnStatusId("Gold");
        $this->premium = $this->returnStatusId("Premium");

        $this->unavailable = $this->returnStatusId("Unavailable");
        $this->available = $this->returnStatusId("Available");
        
        $this->outoffunds = $this->returnStatusId("Out of Funds");
        $this->active = $this->returnStatusId("Active");
        $this->inactive = $this->returnStatusId("Inactive");

        $this->read = $this->returnStatusId("Read");
        $this->unread = $this->returnStatusId("Unread");
    }

    function returnStatusId($status)
    {
        try {
            $status_id = Status::where('name',$status)->first()->id;
            return $status_id; 
        } catch (\Throwable $th) {
            //throw $th;
        }        
    }

    function CreateNotification(array $data)
    {
        $notification = Notification::create([
            'body' => $data['body'], 
            // 'tag' => $data['tag'],
            'status_id' => config('pending'),

            'project_id' => $data['project_id'] ?? NULL,
            'task_id' => $data['task_id'] ?? NULL,
            'sub_task_id' => $data['sub_task_id'] ?? NULL,
            'user_id' => $data['user_id'] ?? NULL,

            'resource_id' => $data['resource_id'] ?? NULL,
            'request_fq_id' => $data['request_fq_id'] ?? NULL,
            'quote_id' => $data['quote_id'] ?? NULL,
            'payment_id' => $data['payment_id'] ?? NULL
        ]);
    }

    function createErrorReport($user_id, $source, $description)
    {
        Error::create([
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
            'status_id' => 1,
            'password' => Hash::make($data['phone']),
        ]);
        
        $user->assignRole('Level 7');
        return $user;
    }

    public function sendMail()
    {
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("bookings.valgeets@gmail.com");
        $email->setSubject("Sending with SendGrid is Fun");
        $email->addTo("endee09@gmail.com", "Nnamdi Ibe");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
            //$response);
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
        
    }
}
