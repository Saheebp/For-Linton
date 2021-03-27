<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

//traits
use App\Traits\AppConfig;
use App\Traits\AppStatus;
use App\Traits\CreateUser;
use App\Traits\LogErrors;
use App\Traits\SendMail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use AppConfig;
    use AppStatus;
    use CreateUser;
    use LogErrors;
    use SendMail;

    public $paid;
    public $unpaid;
    public $declined;

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

    public function __construct()
    {
        $this->paid = $this->returnStatusId("Paid");
        $this->unpaid = $this->returnStatusId('Unpaid');
        $this->declined = $this->returnStatusId("Declined");

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
    }
}
