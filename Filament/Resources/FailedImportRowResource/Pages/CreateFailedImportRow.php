<?php

namespace Modules\Job\Filament\Resources\FailedImportRowResource\Pages;

use Modules\Job\Filament\Resources\FailedImportRowResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFailedImportRow extends CreateRecord
{
    protected static string $resource = FailedImportRowResource::class;
}
