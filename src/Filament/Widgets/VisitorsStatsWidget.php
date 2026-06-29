<?php

namespace Mina\AnalyzeWebsite\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use Mina\AnalyzeWebsite\Facade\Analytics;

class VisitorsStatsWidget extends StatsOverviewWidget
{

    protected  ?string $pollingInterval = '60s';
    protected function getStats(): array
    {
        
        return [

            Stat::make(
                __('analyze-website::analyze-website.widget.today_visitors'), Analytics::todayVisits())
                ->description(__('analyze-website::analyze-website.widget.today_visitors_description'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart($this->getTodayVisitsChart()),

            Stat::make(__('analyze-website::analyze-website.widget.unique_visitors'), Analytics::uniqueVisitors())
                ->description(__('analyze-website::analyze-website.widget.unique_visitors_description'))
                ->descriptionIcon('heroicon-m-users')
                ->color('info')
                ->chart($this->getUniqueVisitorsChart()),

            Stat::make(__('analyze-website::analyze-website.widget.total_visitors'), Analytics::totalVisitors())
                ->description(__('analyze-website::analyze-website.widget.total_visitors_description'))
                ->descriptionIcon('heroicon-m-globe-alt')
                ->color('warning')
                ->chart($this->getTotalVisitsChart()),
        ];
    }
    private function getTodayVisitsChart(): array
    {

        return [5, 10, 7, 12, 9, 15, 20];
    }

    private function getUniqueVisitorsChart(): array
    {
        return [2, 4, 3, 6, 8, 5, 7];
    }

    private function getTotalVisitsChart(): array
    {
        return [20, 25, 30, 28, 35, 40, 45];
    }
}
