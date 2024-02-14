<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Columns;

use Filament\Actions\Concerns\InteractsWithRecord;
use Filament\Tables\Actions\ActionGroup as ActionsActionGroup;
use Illuminate\Database\Eloquent\Model;

/**
 *  @property  Model $record
 */
class ActionGroup extends ActionsActionGroup
{
    use InteractsWithRecord;
    public const ICON_BUTTON_VIEW = 'filament-database-schedule::components.action-group';
    protected string $view = 'filament-database-schedule::components.action-group';
    public function getActions(): array
    {
        return [];
    }
}