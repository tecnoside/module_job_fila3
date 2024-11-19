<?php

/**
 * @see https://github.com/husam-tariq/filament-database-schedule/blob/v2.0.0/src/Filament/Columns/ActionGroup.php
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Columns;

use Filament\Actions\Concerns\InteractsWithRecord;
use Filament\Tables\Actions\ActionGroup as ActionsActionGroup;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Model $record
 */
class ActionGroup extends ActionsActionGroup
{
    use InteractsWithRecord;


    public const ICON_BUTTON_VIEW = 'job::components.action-group';
    protected string $view = 'job::components.action-group';
    public function getActions(): array
    {
        return [];
    }
}
