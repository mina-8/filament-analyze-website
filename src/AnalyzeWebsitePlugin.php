<?php

namespace Mina\AnalyzeWebsite;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Mina\AnalyzeWebsite\Filament\Pages\Analytics;
use Mina\AnalyzeWebsite\Filament\Pages\FilterAnalyze;
use Mina\AnalyzeWebsite\Filament\Widgets\TopPagesWidget;
use Mina\AnalyzeWebsite\Filament\Widgets\TopReferrersWidget;
use Mina\AnalyzeWebsite\Filament\Widgets\VisitorsStatsWidget;
use Mina\AnalyzeWebsite\Filament\Widgets\VisitsChartWidget;

class AnalyzeWebsitePlugin implements Plugin
{
    public function getId(): string
    {
        return 'analyze-website';
    }
    public static function make(): static
    {
        return app(static::class);
    }

    public function register(Panel $panel): void
    {
        $panel
            ->pages([
                Analytics::class,
                FilterAnalyze::class
            ])
            ;

        ;
    }

    public function boot(Panel $panel): void
    {


        // Perform any actions needed when the plugin is booted
    }
}
