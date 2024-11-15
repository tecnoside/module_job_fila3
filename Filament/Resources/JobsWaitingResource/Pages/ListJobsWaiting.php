<?php

declare(strict_types=1);

/**
 * ---.
 */

namespace Modules\Job\Filament\Resources\JobsWaitingResource\Pages;

use Filament\Tables\Table;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Enums\ActionsPosition;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Xot\Filament\Pages\XotBaseListRecords;
use Modules\Job\Filament\Resources\JobsWaitingResource;
use Modules\Job\Filament\Resources\JobsWaitingResource\Widgets\JobsWaitingOverview;

class ListJobsWaiting extends XotBaseListRecords
{
    
    public static string $resource = JobsWaitingResource::class;

    public function getHeaderActions(): array
    {
        return [];
    }

    public function getHeaderWidgets(): array
    {
        return [
            JobsWaitingOverview::class,
        ];
    }

    public function getTitle(): string
    {
        return __('jobs::translations.title');
    }

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
                direction: 'ASC',
            );
    }

    public function getTableActions(): array
    {
        return [
            // ViewAction::make()
            //     ->label(''),
            // EditAction::make()
            //     ->label(''),
            // DeleteAction::make()
            //     ->label('')
            //     ->requiresConfirmation(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
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
                ->label(static::trans('fields.status'))
                ->sortable()
                // ->formatStateUsing(static fn (string $state): string => __("jobs::translations.{$state}"))
                ->color(
                    static fn (string $state): string => match ($state) {
                        'running' => 'primary',
                        'waiting' => 'success',
                        'failed' => 'danger',
                        default => 'secondary',
                    }
                ),
            TextColumn::make('display_name')
                ->label(static::trans('fields.display_name'))
                ->sortable(),
            TextColumn::make('queue')
                ->label(static::trans('fields.queue'))
                ->sortable(),
            TextColumn::make('attempts')
                ->label(static::trans('fields.attempts'))
                ->sortable(),
            TextColumn::make('reserved_at')
                ->label(static::trans('fields.reserved_at'))
                ->since()
                ->sortable(),
            TextColumn::make('created_at')
                ->label(static::trans('fields.created_at'))
                ->since()
                ->sortable(),
        ];
    }
}
