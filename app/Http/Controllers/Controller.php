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
use App\Traits\Wallets;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use AppConfig;
    use AppStatus;
    use CreateUser;
    use LogErrors;
    use SendMail;
    use Wallets;

    public $paid;
    public $unpaid;
    public $pending;
    public $cancelled;
    public $in_progress;
    public $queried;
    public $completed;
    public $new;
    public $gold;
    public $premium;
    public $unavailable;
    public $available;
    public $admin;

    public function __construct()
    {
        $this->paid = $this->returnStatusId("Paid");
        $this->unpaid = $this->returnStatusId('Unpaid');
        $this->pending = $this->returnStatusId("Pending");
        $this->cancelled = $this->returnStatusId("Cancelled");
        $this->in_progress = $this->returnStatusId("In Progress");
        $this->queried = $this->returnStatusId("Queried");
        $this->completed = $this->returnStatusId("Completed");
        $this->new = $this->returnStatusId("New");
        $this->gold = $this->returnStatusId("Gold");
        $this->premium = $this->returnStatusId("Premium");
        $this->unavailable = $this->returnStatusId("Unavailable");
        $this->available = $this->returnStatusId("Available");
        $this->admin = $this->returnStatusId("Admin");
    }
}
