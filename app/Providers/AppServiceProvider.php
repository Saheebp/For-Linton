<?php

namespace App\Providers;

use App\Models\Message;
use App\Models\Setting;

use App\Traits\AppStatus;

use Auth;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    use AppStatus;

    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('*', function ($view) {

            $view->with('paid', $this->returnStatusId("Paid"));
            $view->with('unpaid', $this->returnStatusId("Unaid"));
            $view->with('declined', $this->returnStatusId("Declined"));

            $view->with('new', $this->returnStatusId("New"));
            $view->with('in_progress', $this->returnStatusId("In Progress"));
            $view->with('pending', $this->returnStatusId("Pending"));
            $view->with('completed', $this->returnStatusId("Completed"));
            $view->with('cancelled', $this->returnStatusId("Cancelled"));
            $view->with('overdue', $this->returnStatusId("Overdue"));
            $view->with('queried', $this->returnStatusId("Queried"));

            $view->with('gold', $this->returnStatusId("Gold"));
            $view->with('premium', $this->returnStatusId("Premium"));
            
            $view->with('unavailable', $this->returnStatusId("Unavailable"));
            $view->with('available', $this->returnStatusId("Available"));

            $view->with('active', $this->returnStatusId("Active"));
            $view->with('inactive', $this->returnStatusId("Inactive"));

            $view->with('open', $this->returnStatusId("Open"));
            $view->with('closed', $this->returnStatusId("Closed"));
            $view->with('accepted', $this->returnStatusId("Accepted"));
            $view->with('returned', $this->returnStatusId("Returned"));

            if (Auth::check()) 
            {
                $messages = Message::where('receiver_id',Auth::user()->id)->get();
                $view->with('messages', $messages);
            }else{
                $view->with('messages', NULL);
            }

            $settings = Setting::all()->toArray();
            $view->with('settings', $settings['0']);

            config(['settings', $settings['0']]);
        });

        config(['paid', $this->returnStatusId("Paid")]);
        config(['unpaid', $this->returnStatusId("Unaid")]);
        config(['declined', $this->returnStatusId("Declined")]);

        config(['new' => $this->returnStatusId("New")]);
        config(['in_progress' => $this->returnStatusId("In Progress")]);
        config(['pending' => $this->returnStatusId("Pending")]);
        config(['completed' => $this->returnStatusId("Completed")]);
        config(['cancelled' => $this->returnStatusId("Cancelled")]);
        config(['overdue' => $this->returnStatusId("Overdue")]);
        config(['queried' => $this->returnStatusId("Queried")]);

        config(['gold' => $this->returnStatusId("Gold")]);
        config(['premium' => $this->returnStatusId("Premium")]);
        
        config(['unavailable' => $this->returnStatusId("Unavailable")]);
        config(['available' => $this->returnStatusId("Available")]);

        config(['active' => $this->returnStatusId("Active")]);
        config(['inactive' => $this->returnStatusId("Inactive")]);

        config(['open' => $this->returnStatusId("Open")]);
        config(['closed' => $this->returnStatusId("Closed")]);
        config(['accepted' => $this->returnStatusId("Accepted")]);
        config(['returned' => $this->returnStatusId("Returned")]);
    }
}
