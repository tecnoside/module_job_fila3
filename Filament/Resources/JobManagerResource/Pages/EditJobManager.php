<?php

namespace Modules\Job\Filament\Resources\JobManagerResource\Pages;

use Modules\Job\Filament\Resources\JobManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobManager extends EditRecord
{
    protected static string $resource = JobManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
