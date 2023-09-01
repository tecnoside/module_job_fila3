<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Modules\Job\Filament\Resources\JobBatchesResource\Pages\ListJobBatches;
use Modules\Job\Models\JobBatch;
use Savannabits\FilamentModules\Concerns\ContextualResource;

class JobBatchesResource extends Resource
{
    use ContextualResource;

    protected static ?string $model = JobBatch::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-list';

    protected static ?string $navigationGroup = 'jobs';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->dateTime()->sortable()->searchable()->toggleable(),
                TextColumn::make('id')->sortable()->searchable()->toggleable(),
                TextColumn::make('name')->sortable()->searchable()->toggleable(),
                TextColumn::make('cancelled_at')->dateTime()->sortable()->searchable()->toggleable(),
                TextColumn::make('failed_at')->dateTime()->sortable()->searchable()->toggleable(),
                TextColumn::make('finished_at')->dateTime()->sortable()->searchable()->toggleable(),
                TextColumn::make('total_jobs')->sortable()->searchable()->toggleable(),
                TextColumn::make('pending_jobs')->sortable()->searchable()->toggleable(),
                TextColumn::make('failed_jobs')->sortable()->searchable()->toggleable(),
                TextColumn::make('failed_job_ids')->sortable()->searchable()->toggleable(),
            ])
            ->actions([
                DeleteAction::make('Delete'),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJobBatches::route('/'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return (string) JobBatch::query()->count();
    }
}
