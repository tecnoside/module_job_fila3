<?php

namespace Modules\Job\Filament\Resources\FailedImportRowResource\Pages;

use Modules\Job\Filament\Resources\FailedImportRowResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFailedImportRow extends EditRecord
{
    protected static string $resource = FailedImportRowResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
