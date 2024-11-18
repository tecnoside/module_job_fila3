<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Pages;

use Closure;
use Filament\Tables;
use Filament\Actions;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Modules\Job\Models\Schedule;
use Filament\Tables\Columns\Column;
use Filament\Resources\Pages\ListRecords;
use Modules\Job\Filament\Columns\ActionGroup;
use Modules\Job\Filament\Columns\ScheduleOptions;
use Modules\Xot\Filament\Pages\XotBaseListRecords;
use Modules\Job\Filament\Columns\ScheduleArguments;
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Xot\Filament\Traits\NavigationPageLabelTrait;

class ListSchedules extends XotBaseListRecords
{
    
    protected static string $resource = ScheduleResource::class;

    public function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('command')
                ->getStateUsing(function ($record) {
                    if ($record->command === 'custom') {
                        return $record->command_custom;
                    }

                    return $record->command;
                })
                ->label(static::trans('fields.command'))
                ->searchable()
                ->sortable(),
            ScheduleArguments::make('params')
                ->label(static::trans('fields.arguments'))
                ->searchable()
                ->sortable(),
            ScheduleOptions::make('options')
                ->label(static::trans('fields.options'))
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('expression')
                ->label(static::trans('fields.expression'))
                ->searchable()
                ->sortable(),
            Tables\Columns\TagsColumn::make('environments')
                ->label(static::trans('fields.environments'))
                ->separator(',')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label(static::trans('fields.created_at'))
                ->searchable()
                ->sortable()
                ->dateTime()
                ->wrap(),
            /*
            Tables\Columns\TextColumn::make('updated_at')
                ->getStateUsing(fn ($record) => $record->created_at == $record->updated_at ? static::trans('fields.never') : $record->updated_at)
                ->wrap()
                ->formatStateUsing(static function (Column $column, $state): ?string {
                    $format ??= config('tables.date_time_format');
                    if (blank($state) || $state == static::trans('fields.never')) {
                        return $state;
                    }

                    return Carbon::parse($state)
                        ->setTimezone($timezone ?? $column->getTimezone())
                        ->translatedFormat($format);
                })
                ->label(static::trans('fields.updated_at'))
                ->searchable()
                ->sortable(),
            */
            /*
            Tables\Columns\BadgeColumn::make('status')
                              ->enum([
                                  Schedule::STATUS_INACTIVE => static::trans('status.inactive'),
                                  Schedule::STATUS_TRASHED => static::trans('status.trashed'),
                                  Schedule::STATUS_ACTIVE => static::trans('status.active'),
                              ])
                              ->icons([
                                  'heroicon-o-x',
                                  'heroicon-o-document' => Schedule::STATUS_INACTIVE,
                                  'heroicon-o-x-circle' => Schedule::STATUS_TRASHED,
                                  'heroicon-o-check-circle' => Schedule::STATUS_ACTIVE,
                              ])
                ->colors([
                    'warning' => Schedule::STATUS_INACTIVE,
                    'success' => Schedule::STATUS_ACTIVE,
                    'danger' => Schedule::STATUS_TRASHED,
                ])
                              ->label(static::trans('fields.status'))
                              ->searchable()
                              ->sortable(),
            */
        ];
    }

    public function getTaleFilters(): array
    {
        return [
            Tables\Filters\TrashedFilter::make(),
        ];
    }

    public function getTableActions(): array
    {
        return [
            // ActionGroup::make([
            Tables\Actions\EditAction::make()
                ->hidden(fn ($record) => $record->trashed())
                ->tooltip(__('filament-support::actions/edit.single.label')),
            Tables\Actions\RestoreAction::make()
                ->tooltip(__('filament-support::actions/restore.single.label')),
            Tables\Actions\DeleteAction::make()
                ->tooltip(__('filament-support::actions/delete.single.label')),
            Tables\Actions\ForceDeleteAction::make()
                ->tooltip(__('filament-support::actions/force-delete.single.label')),
            /*
            Tables\Actions\Action::make('toggle')
                ->disabled(fn ($record) => $record->trashed())
                ->icon(fn ($record) => Schedule::STATUS_ACTIVE == $record->status ? 'schedule-pause-fill' : 'schedule-play-fill')
                          ->color(fn ($record) => Schedule::STATUS_ACTIVE == $record->status ? 'warning' : 'success')
                          ->action(function ($record): void {
                              if (Schedule::STATUS_ACTIVE == $record->status) {
                                  $record->status = Schedule::STATUS_INACTIVE;
                              } elseif (Schedule::STATUS_INACTIVE == $record->status) {
                                  $record->status = Schedule::STATUS_ACTIVE;
                              }
                              $record->save();
                          })
                          ->tooltip(fn ($record) => Schedule::STATUS_ACTIVE == $record->status ? static::trans('buttons.inactivate') : static::trans('buttons.activate')),
            */
            Tables\Actions\ViewAction::make()
                ->icon('history')
                ->color('gray')
                ->tooltip(static::trans('buttons.history')),
            // ]),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            Tables\Actions\DeleteBulkAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns($this->getTableColumns())
            ->filters($this->getTableFilters())
            ->actions($this->getTableActions())
            ->bulkActions($this->getTableBulkActions());
        /*
        ->defaultSort(
            config('filament-database-schedule.default_ordering'),
            config('filament-database-schedule.default_ordering_direction')
        )
        */
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return static fn (): ?string => null;
    }
}
