<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Job\Filament\Resources\JobResource;

class ListJobs extends ListRecords
{
    protected static string $resource = JobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
