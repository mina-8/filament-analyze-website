<?php

namespace Mina\AnalyzeWebsite\Drivers;

use Mina\AnalyzeWebsite\Interface\AnalyticsDriver;
use Mina\AnalyzeWebsite\Models\PageVisit;

class DatabaseDriver implements AnalyticsDriver
{
    public function track(array $data): void
    {
       PageVisit::create($data);
    }
}
