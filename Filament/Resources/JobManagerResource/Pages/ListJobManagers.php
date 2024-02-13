<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobManagerResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Job\Filament\Resources\JobManagerResource;

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
