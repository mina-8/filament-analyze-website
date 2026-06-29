<?php

namespace Mina\AnalyzeWebsite\Filament\Widgets;

use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Mina\AnalyzeWebsite\Facade\Analytics;
use Mina\AnalyzeWebsite\Service\AnalyticsService;

class TopReferrersWidget extends TableWidget
{

    protected  ?string $pollingInterval = '60s';
    // protected static ?string $heading = 'Top Referrers';

    public function getHeading(): ?string
{
    return __('analyze-website::analyze-website.top_referrers.heading');
}

    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->records(fn() => collect(
                Analytics::topReferrers()
            ))
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('referer')
                ->label(__('analyze-website::analyze-website.top_referrers.referer')),

                \Filament\Tables\Columns\TextColumn::make('total')
                ->label(__('analyze-website::analyze-website.top_referrers.total')),
            ])
            ;
    }
}
