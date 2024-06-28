<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ExportResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Job\Filament\Resources\ExportResource;
=======
namespace Modules\Job\Filament\Resources\ExportResource\Pages;

use Modules\Job\Filament\Resources\ExportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
>>>>>>> 21140ac (first)

class EditExport extends EditRecord
{
    protected static string $resource = ExportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
