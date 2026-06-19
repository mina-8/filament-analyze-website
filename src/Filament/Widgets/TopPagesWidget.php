<?php

namespace Mina\AnalyzeWebsite\Filament\Widgets;

use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Support\Collection;
use Mina\AnalyzeWebsite\Facade\Analytics;
use Mina\AnalyzeWebsite\Service\AnalyticsService;

class TopPagesWidget extends TableWidget
{

    protected  ?string $pollingInterval = '60s';
    protected static ?string $heading = 'Top Pages';

    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        $rows = collect(
            Analytics::topPages()
        );

        return $table
            ->records(fn() => $rows)
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('path'),

                \Filament\Tables\Columns\TextColumn::make('total'),
            ]);
    }
}
