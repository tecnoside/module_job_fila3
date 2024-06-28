<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ImportResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Job\Filament\Resources\ImportResource;
=======
namespace Modules\Job\Filament\Resources\ImportResource\Pages;

use Modules\Job\Filament\Resources\ImportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
>>>>>>> 21140ac (first)

class EditImport extends EditRecord
{
    protected static string $resource = ImportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
