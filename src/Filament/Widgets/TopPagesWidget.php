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
    // protected static ?string $heading = 'Top Pages';
    public function getHeading(): ?string
{
    return __('analyze-website::analyze-website.top_pages.heading');
}

    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        $rows = collect(
            Analytics::topPages()
        );

        return $table
            ->records(fn() => $rows)
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('path')
                 ->label(__('analyze-website::analyze-website.top_pages.path')),

                \Filament\Tables\Columns\TextColumn::make('total')
                 ->label(__('analyze-website::analyze-website.top_pages.total')),
            ]);
    }
}
