<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ExportResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Job\Filament\Resources\ExportResource;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;

class ListExports extends ListRecords
{
    protected static string $resource = ExportResource::class;

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
