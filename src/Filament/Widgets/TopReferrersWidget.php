<?php

namespace Mina\AnalyzeWebsite\Filament\Widgets;

use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Mina\AnalyzeWebsite\Facade\Analytics;
use Mina\AnalyzeWebsite\Service\AnalyticsService;

class TopReferrersWidget extends TableWidget
{

    protected  ?string $pollingInterval = '60s';
    protected static ?string $heading = 'Top Referrers';

    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->records(fn() => collect(
                Analytics::topReferrers()
            ))
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('referer'),

                \Filament\Tables\Columns\TextColumn::make('total'),
            ])
            ;
    }
}
