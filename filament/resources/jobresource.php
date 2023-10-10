<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Modules\Job\Filament\Resources\JobResource\Pages\CreateJob;
use Modules\Job\Filament\Resources\JobResource\Pages\EditJob;
use Modules\Job\Filament\Resources\JobResource\Pages\ListJobs;
use Modules\Job\Models\Job;
use Modules\Xot\Filament\Resources\XotBaseResource;

class JobResource extends XotBaseResource
{
    // //
    // protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    // protected static ?string $navigationGroup = 'jobs';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable()->toggleable(),
                TextColumn::make('queue'),

                // Tables\Columns\TextColumn::make('payload'),
                TextColumn::make('attempts'),
                TextColumn::make('reserved_at'),
                TextColumn::make('available_at'),
                TextColumn::make('created_at'),
                // Tables\Columns\TextColumn::make('created_by'),
                // Tables\Columns\TextColumn::make('updated_by'),
                // Tables\Columns\TextColumn::make('updated_at'),
                ViewColumn::make('payload')->view('job::filament.tables.columns.array'),
            ])
            ->filters([
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJobs::route('/'),
            'create' => CreateJob::route('/create'),
            'edit' => EditJob::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Job::query()->count();
    }
}
