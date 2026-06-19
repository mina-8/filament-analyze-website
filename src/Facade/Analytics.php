<?php

namespace Mina\AnalyzeWebsite\Facade;

use Illuminate\Support\Facades\Facade;
use Mina\AnalyzeWebsite\Service\AnalyticsService;

class Analytics extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AnalyticsService::class;
    }
}
