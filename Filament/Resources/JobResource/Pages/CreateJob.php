<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Job\Filament\Resources\JobResource;

class CreateJob extends CreateRecord
{
    protected static string $resource = JobResource::class;
}
