<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobManagerResource\Pages;

use Filament\Actions;
use Filament\Tables\Table;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Enums\ActionsPosition;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Xot\Filament\Pages\XotBaseListRecords;
use Modules\Job\Filament\Resources\JobManagerResource;

class ListJobManagers extends XotBaseListRecords
{
    
    protected static string $resource = JobManagerResource::class;

    public function table(Table $table): Table
    {
        return $table
            // ->columns($this->getTableColumns())
            ->columns($this->layoutView->getTableColumns())
            ->contentGrid($this->layoutView->getTableContentGrid())
            ->headerActions($this->getTableHeaderActions())

            ->filters($this->getTableFilters())
            ->filtersLayout(FiltersLayout::AboveContent)
            ->persistFiltersInSession()
            ->actions($this->getTableActions())
            ->bulkActions($this->getTableBulkActions())
            ->actionsPosition(ActionsPosition::BeforeColumns)
            ->defaultSort(
                column: 'created_at',
                direction: 'DESC',
            );
    }

    public function getGridTableColumns(): array
    {
        return [
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('status')
                ->badge()
                ->label(__('jobs::translations.status'))
                ->sortable()
                ->formatStateUsing(static fn (string $state): string => __("jobs::translations.{$state}"))
                ->color(
                    static fn (string $state): string => match ($state) {
                        'running' => 'primary',
                        'succeeded' => 'success',
                        'failed' => 'danger',
                        default => 'secondary',
                    }
                ),
            TextColumn::make('name')
                ->label(__('jobs::translations.name'))
                ->sortable(),
            TextColumn::make('queue')
                ->label(__('jobs::translations.queue'))
                ->sortable(),
            TextColumn::make('progress')
                ->label(__('jobs::translations.progress'))
                ->formatStateUsing(static fn (string $state): string => "{$state}%")
                ->sortable(),
            // ProgressColumn::make('progress')->label(__('jobs::translations.progress'))->color('warning'),
            TextColumn::make('started_at')
                ->label(__('jobs::translations.started_at'))
                ->since()
                ->sortable(),
        ];
    }

    public function getTableActions(): array
    {
        return [
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
