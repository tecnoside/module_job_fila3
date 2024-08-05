<?php

declare(strict_types=1);

/**
 * ---.
 */

namespace Modules\Job\Filament\Resources\JobsWaitingResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Modules\Job\Filament\Resources\JobsWaitingResource;
use Modules\Job\Filament\Resources\JobsWaitingResource\Widgets\JobsWaitingOverview;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;

class ListJobsWaiting extends ListRecords
{
    public static string $resource = JobsWaitingResource::class;

    public TableLayoutEnum $layoutView = TableLayoutEnum::GRID;

    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make(),
        ];
    }

    public function getHeaderActions(): array
    {
        return [];
    }

    public function getHeaderWidgets(): array
    {
        return [
            JobsWaitingOverview::class,
        ];
    }

    public function getTitle(): string
    {
        return __('jobs::translations.title');
    }
}
