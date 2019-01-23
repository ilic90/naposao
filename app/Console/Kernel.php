<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Ad;
use App\Company;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        logger('usoUScheduler');
        $schedule->call(function(){
            $ads = Ad::all();
            logger(json_encode($ads));
            foreach($ads as $ad){
                if($ad->dateFormat($ad->expiration_date) < Carbon::now()){
                    $ad->approved = 0;
                    $ad->promotion_date = null;
                    $ad->reinforcement_date = null;
                    $ad->save();
                }
            }
            $companies = Company::all();
            foreach($companies as $company){
                if($company->dateFormat($company->promotion) < Carbon::now()){
                    $company->promotion = null;
                    $company->save();
                }
            }
        });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
