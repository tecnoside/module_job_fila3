<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Job\Filament\Resources\FailedImportRowResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Job\Filament\Resources\FailedImportRowResource;
=======
namespace Modules\Job\Filament\Resources\FailedImportRowResource\Pages;

use Modules\Job\Filament\Resources\FailedImportRowResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
>>>>>>> 21140ac (first)

class CreateFailedImportRow extends CreateRecord
{
    protected static string $resource = FailedImportRowResource::class;
}
