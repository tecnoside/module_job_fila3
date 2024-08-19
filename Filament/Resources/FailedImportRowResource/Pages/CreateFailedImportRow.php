<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\FailedImportRowResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Job\Filament\Resources\FailedImportRowResource;

class CreateFailedImportRow extends CreateRecord
{
    protected static string $resource = FailedImportRowResource::class;
}
