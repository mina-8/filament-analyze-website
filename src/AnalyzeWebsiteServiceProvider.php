<?php


namespace Mina\AnalyzeWebsite;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Mina\AnalyzeWebsite\Drivers\DatabaseDriver;
use Mina\AnalyzeWebsite\Drivers\QueueDriver;
use Mina\AnalyzeWebsite\Drivers\RedisDriver;
use Mina\AnalyzeWebsite\Filament\Widgets\TopPagesWidget;
use Mina\AnalyzeWebsite\Filament\Widgets\TopReferrersWidget;
use Mina\AnalyzeWebsite\Filament\Widgets\VisitorsStatsWidget;
use Mina\AnalyzeWebsite\Filament\Widgets\VisitsChartWidget;
use Mina\AnalyzeWebsite\Interface\AnalyticsDriver;
use Mina\AnalyzeWebsite\Middleware\TrackVisit;
use Mina\AnalyzeWebsite\Service\AnalyticsService;

class AnalyzeWebsiteServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(AnalyticsDriver::class, function ($app) {
            $driver = config('analyze-website.driver');

            return match ($driver) {
                'queue' => $this->app->make(QueueDriver::class),
                'database' => $this->app->make(DatabaseDriver::class),
                default => $this->app->make(RedisDriver::class),
            };
        });

        $this->app->singleton(AnalyticsService::class);


        $this->mergeConfigFrom(
            __DIR__ . '/../config/analyze-website.php',
            'analyze-website'
        );
    }

    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'analyze-website');


        Livewire::component(
            'mina-analyze-website-visitors-stats-widget',
            VisitorsStatsWidget::class
        );

        Livewire::component(
            'mina-analyze-website-visits-chart-widget',
            VisitsChartWidget::class
        );

        Livewire::component(
            'mina-analyze-website-top-pages-widget',
            TopPagesWidget::class
        );

        Livewire::component(
            'mina-analyze-website-top-referrers-widget',
            TopReferrersWidget::class
        );

        $this->publishes([
            __DIR__ . '/../config/analyze-website.php' => config_path('analyze-website.php'),

        ], 'analyze-config');
    }
}
