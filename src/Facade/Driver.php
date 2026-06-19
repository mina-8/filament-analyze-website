<?php

namespace Mina\AnalyzeWebsite\Facade;

use Illuminate\Support\Facades\Facade;
use Mina\AnalyzeWebsite\Interface\AnalyticsDriver;

class Driver extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AnalyticsDriver::class;
    }
}
