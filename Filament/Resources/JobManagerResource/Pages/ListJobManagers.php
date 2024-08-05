<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobManagerResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Job\Filament\Resources\JobManagerResource;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;

class ListJobManagers extends ListRecords
{
    protected static string $resource = JobManagerResource::class;

    public TableLayoutEnum $layoutView = TableLayoutEnum::GRID;

    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
