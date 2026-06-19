<?php

namespace Mina\AnalyzeWebsite\Interface;

interface AnalyticsDriver
{
    public function track(array $data): void;
}
