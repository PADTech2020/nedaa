<?php

namespace App\Console;

use Botble\Rss\Models\Rss;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

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
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            Rss::GetRSS('google-news-sa');
            Rss::GetRSS('sabq');
            Rss::GetRSS('argaam');
            Rss::GetRSS('al-jazeera-english');
        })->hourly();
        $schedule->call(function () {
                    DB::table('rss')->whereRaw('created_at <= now() - interval 24 hour')->delete();
                 })->hourly();
        $schedule->call(function () {
            DB::table('audit_histories')->whereRaw('created_at <= now() - interval 3 week')->delete();
        })->hourly();
        $schedule->call(function () {
            DB::table('request_logs')->whereRaw('created_at <= now() - interval 3 week')->delete();
        })->hourly();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
