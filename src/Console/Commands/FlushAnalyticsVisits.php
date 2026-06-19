<?php

namespace Mina\AnalyzeWebsite\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use Mina\AnalyzeWebsite\Models\PageVisit;

class FlushAnalyticsVisits extends Command
{
    protected $signature = 'analytics:flush';

    protected $description = 'Flush Redis analytics visits to database';

    public function handle(): void
    {
        $records = [];

        while ($data = Redis::lpop('analytics:visits')) {

            $records[] = json_decode($data, true);

            if (count($records) >= 500) {
                PageVisit::insert($records);
                $records = [];
            }
        }

        if (! empty($records)) {
            PageVisit::insert($records);
        }

        $this->info('Analytics flushed successfully.');
    }
}
