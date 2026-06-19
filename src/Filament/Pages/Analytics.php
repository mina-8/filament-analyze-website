<?php

namespace Mina\AnalyzeWebsite\Filament\Pages;

use Filament\Pages\Page;
use BackedEnum;
use Filament\Support\Icons\Heroicon;
use Mina\AnalyzeWebsite\Filament\Widgets\TopPagesWidget;
use Mina\AnalyzeWebsite\Filament\Widgets\TopReferrersWidget;
use Mina\AnalyzeWebsite\Filament\Widgets\VisitorsStatsWidget;
use Mina\AnalyzeWebsite\Filament\Widgets\VisitsChartWidget;

class Analytics extends Page
{
    protected string $view = 'analyze-website::filament.pages.analytics';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChartBar;

    protected static ?string $navigationLabel = 'Analytics';

    protected static ?string $slug = 'analytics';

    protected function getHeaderWidgets(): array
    {
        return [
            VisitorsStatsWidget::class,
            VisitsChartWidget::class,
            TopPagesWidget::class,
            TopReferrersWidget::class,
        ];
    }
}
