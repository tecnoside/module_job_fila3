<?php

declare(strict_types=1);

/**
 * @see https://github.com/mooxphp/jobs/tree/main
 */

namespace Modules\Job\Filament\Resources;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Job\Filament\Resources\JobManagerResource\Pages;
use Modules\Job\Filament\Resources\JobManagerResource\Widgets;
use Modules\Job\Models\JobManager;
use Modules\Xot\Filament\Resources\XotBaseResource;

class JobManagerResource extends XotBaseResource
{
    protected static ?string $model = JobManager::class;

    protected static ?string $navigationIcon = 'heroicon-o-play';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    TextInput::make('job_id')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('name')
                        ->maxLength(255),
                    TextInput::make('queue')
                        ->maxLength(255),
                    DateTimePicker::make('started_at'),
                    DateTimePicker::make('finished_at'),
                    Toggle::make('failed')
                        ->required(),
                    TextInput::make('attempt')
                        ->required(),
                    Textarea::make('exception_message')
                        ->maxLength(65535),
                ]
            );
    }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->poll('5s')
    //         ->deferLoading()
    //         ->columns(
    //             [
    //                 TextColumn::make('status')
    //                     ->badge()
    //                     ->label(__('jobs::translations.status'))
    //                     ->sortable()
    //                     ->formatStateUsing(static fn (string $state): string => __("jobs::translations.{$state}"))
    //                     ->color(
    //                         static fn (string $state): string => match ($state) {
    //                             'running' => 'primary',
    //                             'succeeded' => 'success',
    //                             'failed' => 'danger',
    //                             default => 'secondary',
    //                         }
    //                     ),
    //                 TextColumn::make('name')
    //                     ->label(__('jobs::translations.name'))
    //                     ->sortable(),
    //                 TextColumn::make('queue')
    //                     ->label(__('jobs::translations.queue'))
    //                     ->sortable(),
    //                 TextColumn::make('progress')
    //                     ->label(__('jobs::translations.progress'))
    //                     ->formatStateUsing(static fn (string $state): string => "{$state}%")
    //                     ->sortable(),
    //                 // ProgressColumn::make('progress')->label(__('jobs::translations.progress'))->color('warning'),
    //                 TextColumn::make('started_at')
    //                     ->label(__('jobs::translations.started_at'))
    //                     ->since()
    //                     ->sortable(),
    //             ]
    //         )
    //         ->defaultSort('id', 'desc')
    //         ->bulkActions(
    //             [
    //                 DeleteBulkAction::make(),
    //             ]
    //         );
    // }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobManagers::route('/'),
            'create' => Pages\CreateJobManager::route('/create'),
            'edit' => Pages\EditJobManager::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            Widgets\JobStatsOverview::class,
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }
}
