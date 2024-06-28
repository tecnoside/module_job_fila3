<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ImportResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Job\Filament\Resources\ImportResource;
=======
namespace Modules\Job\Filament\Resources\ImportResource\Pages;

use Modules\Job\Filament\Resources\ImportResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
>>>>>>> 21140ac (first)

class CreateImport extends CreateRecord
{
    protected static string $resource = ImportResource::class;
}
