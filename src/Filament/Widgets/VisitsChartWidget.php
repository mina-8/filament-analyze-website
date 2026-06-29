<?php

namespace Mina\AnalyzeWebsite\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Mina\AnalyzeWebsite\Facade\Analytics;
use Mina\AnalyzeWebsite\Service\AnalyticsService;

class VisitsChartWidget extends ChartWidget
{

    protected  ?string $pollingInterval = '60s';
    // protected  ?string $heading = 'Visits Last 7 Days';
        public function getHeading(): ?string
    {
        return __('analyze-website::analyze-website.chart.heading');
    }

    protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
        // $service = app(AnalyticsService::class);

        $labels = [];
        $data = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);

            $labels[] = $date->format('M d');

            $data[] = Analytics::visitsByDate(
                $date->toDateString()
            );
        }

        return [
            'datasets' => [
                [
                    'label' => 'Visits',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
