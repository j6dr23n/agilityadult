<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('backup:run')->timezone('Asia/Yangon')->at('00:00');
        $schedule->command('backup:clean')->timezone('Asia/Yangon')->at('00:10');
        $schedule->command('backup:monitor')->timezone('Asia/Yangon')->at('00:20');
        $schedule->command('queue:retry all')->timezone('Asia/Yangon')->at('06:00');
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
