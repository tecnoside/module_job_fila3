<?php

namespace Modules\Job\Filament\Resources\JobManagerResource\Pages;

use Modules\Job\Filament\Resources\JobManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJobManager extends CreateRecord
{
    protected static string $resource = JobManagerResource::class;
}
