<?php

namespace Mina\AnalyzeWebsite\Service;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Mina\AnalyzeWebsite\Models\PageVisit;

class AnalyticsService
{
    protected int $cacheSeconds = 1800; // 30 minutes

    public function todayVisits(): int
    {
        return Cache::remember(
            'analytics.today_visits',
            $this->cacheSeconds,
            fn() => PageVisit::whereDate('visited_at', today())->count()
        );
    }

    public function uniqueVisitors(): int
    {
        return Cache::remember(
            'analytics.unique_visitors',
            $this->cacheSeconds,
            fn() => PageVisit::distinct('ip')->count('ip')
        );
    }

    public function totalVisitors(): int
    {
        return Cache::remember(
            'analytics.total_visitors',
            $this->cacheSeconds,
            fn() => PageVisit::count()
        );
    }

    public function topPages(int $limit = 10): array
    {
        return Cache::remember(
            "analytics.top_pages.{$limit}",
            $this->cacheSeconds,
            fn() => PageVisit::select('path', DB::raw('COUNT(*) as total'))
                ->groupBy('path')
                ->orderByDesc('total')
                ->limit($limit)
                ->get()
                ->toArray()
        );
    }

    public function topReferrers(int $limit = 10): array
    {
        return Cache::remember(
            "analytics.top_referrers.{$limit}",
            $this->cacheSeconds,
            fn() => PageVisit::select('referer', DB::raw('COUNT(*) as total'))
                ->whereNotNull('referer')
                ->groupBy('referer')
                ->orderByDesc('total')
                ->limit($limit)
                ->get()
                ->toArray()
        );
    }

    public function visitsByDate(string $date): int
    {
        return Cache::remember(
            "analytics.visits_by_date.{$date}",
            $this->cacheSeconds,
            fn() => PageVisit::whereDate('visited_at', $date)->count()
        );
    }


    public function visitsBetweenGroupedByDate(
        string $from,
        string $to,
    ): array {
        return PageVisit::query()
            ->selectRaw('DATE(visited_at) as date, COUNT(*) as total')
            ->whereBetween('visited_at', [$from, $to])
            ->groupByRaw('DATE(visited_at)')
            ->orderBy('date')
            ->pluck('total', 'date')
            ->toArray();
    }
}
