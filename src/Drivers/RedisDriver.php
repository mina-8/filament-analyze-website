<?php

namespace Mina\AnalyzeWebsite\Drivers;

use Illuminate\Support\Facades\Redis;
use Mina\AnalyzeWebsite\Interface\AnalyticsDriver;

class RedisDriver implements AnalyticsDriver
{
    public function track(array $data): void
    {
        // Store the visit data in Redis for later processing
        Redis::rPush('analytics:page_visits', json_encode($data));
    }
}
