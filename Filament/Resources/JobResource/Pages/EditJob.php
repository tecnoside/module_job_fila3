<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobResource\Pages;

use Filament\Pages\Actions\DeleteAction;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Job\Filament\Resources\JobResource;

final class EditJob extends EditRecord
{
    protected static string $resource = JobResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
