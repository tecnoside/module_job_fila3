<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Filament\Forms\Form;
use Modules\Job\Filament\Resources\JobResource\Pages;
use Modules\Job\Filament\Resources\JobResource\Widgets;
use Modules\Job\Models\Job;
use Modules\Xot\Filament\Resources\XotBaseResource;

class JobResource extends XotBaseResource
{
    protected static ?string $model = Job::class;
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                ]
            );
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'board' => Pages\BoardJobs::route('/board'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
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
        //    return (string) Job::query()->count();
        return number_format(static::getModel()::count());
    }
}
