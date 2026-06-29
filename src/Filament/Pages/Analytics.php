<?php

namespace Mina\AnalyzeWebsite\Filament\Pages;

use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Pages\Page;
use BackedEnum;
use Filament\Support\Icons\Heroicon;
use Mina\AnalyzeWebsite\Filament\Widgets\TopPagesWidget;
use Mina\AnalyzeWebsite\Filament\Widgets\TopReferrersWidget;
use Mina\AnalyzeWebsite\Filament\Widgets\VisitorsStatsWidget;
use Mina\AnalyzeWebsite\Filament\Widgets\VisitsChartWidget;

class Analytics extends Page
{
    use HasFiltersForm;
    protected string $view = 'analyze-website::filament.pages.analytics';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChartBar;

    // protected static ?string $navigationLabel = 'Analytics';

    protected static ?string $slug = 'analytics';

    protected static ?string $navigationLabel = null;

    public static function getNavigationLabel(): string
    {
        return __('analyze-website::analyze-website.title');
    }

    public static function getPluralModelLabel(): string
    {
        return __('analyze-website::analyze-website.title');
    }

    public static function getModelLabel(): string
    {
        return __('analyze-website::analyze-website.title');
    }
    public function getHeading(): string
    {
        return __('analyze-website::analyze-website.title');
    }

    public function getSubheading(): ?string
    {
        return __('analyze-website::analyze-website.description');
    }


    protected function getFooterWidgets(): array
    {
        return [
            VisitorsStatsWidget::class,
            VisitsChartWidget::class,
            TopPagesWidget::class,
            TopReferrersWidget::class,
        ];
    }
}
