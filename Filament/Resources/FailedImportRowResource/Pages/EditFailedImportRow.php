<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\FailedImportRowResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Job\Filament\Resources\FailedImportRowResource;

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
