<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Job\Filament\Resources\FailedImportRowResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Job\Filament\Resources\FailedImportRowResource;
=======
namespace Modules\Job\Filament\Resources\FailedImportRowResource\Pages;

use Modules\Job\Filament\Resources\FailedImportRowResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
>>>>>>> 21140ac (first)

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
