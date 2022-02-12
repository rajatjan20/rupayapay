<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\RpaylinksWithExpiry::class,
        Commands\PaylinksWithOutExpiry::class,
        Commands\VendorSettlement::class,
        Commands\VendorTransTrack::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('rpaylinkswithexpiry:daily')->daily();
        $schedule->command('rpaylinkswithoutexpiry:daily')->daily();
        $schedule->command('vendorsettlement:daily')->daily();
        $schedule->command('vendortranstrack:daily')->daily();
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
