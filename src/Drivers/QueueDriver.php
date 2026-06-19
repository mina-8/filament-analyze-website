<?php

namespace Mina\AnalyzeWebsite\Drivers;

use Mina\AnalyzeWebsite\Interface\AnalyticsDriver;
use Mina\AnalyzeWebsite\Jobs\StoreVisitJob;

class QueueDriver implements AnalyticsDriver
{
    public function track(array $data): void
    {
        // Dispatch a job to handle the tracking asynchronously
        StoreVisitJob::dispatch($data);
    }
}
