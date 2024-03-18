<?php

namespace Modules\Job\Filament\Resources\ImportResource\Pages;

use Modules\Job\Filament\Resources\ImportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImports extends ListRecords
{
    protected static string $resource = ImportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
