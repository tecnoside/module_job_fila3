<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ImportResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Job\Filament\Resources\ImportResource;

class CreateImport extends CreateRecord
{
    protected static string $resource = ImportResource::class;
}
