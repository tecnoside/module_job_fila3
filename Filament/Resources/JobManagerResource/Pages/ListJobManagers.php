<?php

namespace Modules\Job\Filament\Resources\JobManagerResource\Pages;

use Modules\Job\Filament\Resources\JobManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJobManagers extends ListRecords
{
    protected static string $resource = JobManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
