<?php

namespace Mina\AnalyzeWebsite\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Mina\AnalyzeWebsite\Filament\Widgets\ReportVisitsChartWidget;

class FilterAnalyze extends Page
{
    use HasFiltersForm;

    protected string $view = 'analyze-website::filament.pages.filter-analyze';

    // protected static ?string $navigationParentItem = 'Analytics';
    // protected static ?string $navigationParentItem = null;

    public static function getNavigationParentItem(): ?string
    {
        return __('analyze-website::analyze-website.title');
    }

    public static function getNavigationLabel(): string
    {
        return __('analyze-website::analyze-website.reports.title');
    }

    public static function getPluralModelLabel(): string
    {
        return __('analyze-website::analyze-website.reports.title');
    }

    public static function getModelLabel(): string
    {
        return __('analyze-website::analyze-website.reports.title');
    }
    public function getHeading(): string
    {
        return __('analyze-website::analyze-website.reports.title');
    }

    public function getSubheading(): ?string
    {
        return __('analyze-website::analyze-website.reports.description');
    }

    public function filtersForm(Schema $form): Schema
    {
        return $form
            ->schema([
                DatePicker::make('from')
                    ->label(__('analyze-website::analyze-website.reports.from'))
                    ->native(false)
                    ->default(now()->subDays(30)),

                DatePicker::make('to')
                    ->label(__('analyze-website::analyze-website.reports.to'))
                    ->native(false)
                    ->default(now()),
            ]);
    }

    protected function getFooterWidgets(): array
    {
        return [
            ReportVisitsChartWidget::class,
        ];
    }

}
