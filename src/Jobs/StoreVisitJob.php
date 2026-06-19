<?php

namespace Mina\AnalyzeWebsite\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mina\AnalyzeWebsite\Models\PageVisit;
use Mina\AnalyzeWebsite\Models\Visit;

class StoreVisitJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public array $data
    ) {}

    public function handle(): void
    {
        PageVisit::create($this->data);
    }
}
