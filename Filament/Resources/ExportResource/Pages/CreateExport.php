<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ExportResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Job\Filament\Resources\ExportResource;
=======
namespace Modules\Job\Filament\Resources\ExportResource\Pages;

use Modules\Job\Filament\Resources\ExportResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
>>>>>>> 21140ac (first)

class CreateExport extends CreateRecord
{
    protected static string $resource = ExportResource::class;
}
