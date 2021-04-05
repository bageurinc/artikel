<?php

namespace Bageur\Artikel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;
use Bageur\Artikel\model\artikel;
use Carbon\Carbon;
class ArtikelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
     protected $commands = [
        'Bageur\Artikel\Commands\upschdule'
    ];
    
    public function register()
    {
        $this->app->make('Bageur\Artikel\ArtikelController');
        $this->app->make('Bageur\Artikel\AuthorController');
        $this->app->make('Bageur\Artikel\KategoriController');
        $this->app->make('Bageur\Artikel\KomenController');
        $this->commands($this->commands);

        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            $checkschedule = artikel::whereNotNull('publish_at')
                                    ->whereDate('publish_at',Carbon::today()->toDateString())
                                    ->get();
            foreach ($checkschedule as $key => $value) {
                $d = Carbon::create($value->publish_at)->format("i H d m *");
                $schedule->command('bageur:artikel-up '.$value->id)->cron($d);
            }
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/migration');
    }
}
