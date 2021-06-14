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
use App\Traits\CreateLog;
use App\Traits\CreateNotification;
use App\Traits\LogErrors;
use App\Traits\SendMail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use AppConfig;
    use AppStatus;
    use CreateUser;
    use CreateLog;
    use CreateNotification;
    use LogErrors;
    use SendMail;

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
    }
}
