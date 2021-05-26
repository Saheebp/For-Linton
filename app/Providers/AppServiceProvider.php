<?php

namespace App\Providers;

use App\Models\Message;
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

            if (Auth::check()) {
                $messages = Message::where('receiver_id',Auth::user()->id)->get();
                $view->with('messages', $messages);
            }else{
                $view->with('messages', NULL);
            }
            
        });
    }
}
