<?php

namespace Modules\Job\Filament\Columns;

use Illuminate\Database\Eloquent\Model;
use Filament\Actions\Concerns\InteractsWithRecord;
use Filament\Tables\Actions\ActionGroup as ActionsActionGroup;


/**
 *  @property  Model $record
 */
class ActionGroup extends ActionsActionGroup
{
    use InteractsWithRecord;

    protected string $view = 'filament-database-schedule::components.action-group';
    public const ICON_BUTTON_VIEW = 'filament-database-schedule::components.action-group';
    public function getActions(): array
    {
        $actions = [];
        //Call to an undefined method Filament\Tables\Actions\Action|Filament\Tables\Actions\BulkAction::record().
        /*
        foreach ($this->actions as $action) {
            $actions[$action->getName()] = $action
            ->view('filament-database-schedule::actions.button-action')->size('md')
            ->record($this->getRecord());
        }
        */

        return $actions;
    }
}
