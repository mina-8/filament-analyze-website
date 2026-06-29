<?php

namespace Mina\AnalyzeWebsite\Filament\Widgets;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Mina\AnalyzeWebsite\Facade\Analytics;

class ReportVisitsChartWidget extends VisitsChartWidget
{
    use InteractsWithPageFilters;
    protected  ?string $pollingInterval = '60s';
    public function getHeading(): ?string
    {
        return null;
        // return __('analyze-website::analyze-website.chart.heading');
    }

    protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
        // $service = app(AnalyticsService::class);

        $from = Carbon::parse(
            $this->filters['from'] ?? now()->subDays(30)
        );

        $to = Carbon::parse(
            $this->filters['to'] ?? now()
        );

        $rows = Analytics::visitsBetweenGroupedByDate(
            $from->toDateString(),
            $to->toDateString()
        );

        $labels = [];
        $data = [];

        foreach (CarbonPeriod::create($from, $to) as $date) {

            $key = $date->toDateString();

            $labels[] = $date->format('M d');

            $data[] = $rows[$key] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => __('analyze-website::analyze-website.chart.label'),
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
