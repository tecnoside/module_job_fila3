<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Filament\Forms\Form;
use Modules\Job\Filament\Resources\FailedImportRowResource\Pages;
use Modules\Job\Models\FailedImportRow;
use Modules\Xot\Filament\Resources\XotBaseResource;

class FailedImportRowResource extends XotBaseResource
{
    protected static ?string $model = FailedImportRow::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
            'index' => Pages\ListFailedImportRows::route('/'),
            'create' => Pages\CreateFailedImportRow::route('/create'),
            'edit' => Pages\EditFailedImportRow::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }
}
