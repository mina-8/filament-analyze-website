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

            Stat::make('Today Visits', Analytics::todayVisits())
                ->description('Visits in the current day')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart($this->getTodayVisitsChart()),

            Stat::make('Unique Visitors', Analytics::uniqueVisitors())
                ->description('All unique visitors')
                ->descriptionIcon('heroicon-m-users')
                ->color('info')
                ->chart($this->getUniqueVisitorsChart()),

            Stat::make('Total Visits', Analytics::totalVisitors())
                ->description('All time visits')
                ->descriptionIcon('heroicon-m-globe-alt')
                ->color('warning')
                ->chart($this->getTotalVisitsChart()),
        ];
    }
    private function getTodayVisitsChart(): array
    {
        // مثال بسيط - استبدله بداتا حقيقية من analytics
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
