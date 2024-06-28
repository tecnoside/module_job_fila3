<?php
<<<<<<< HEAD
/**
 * @see https://github.com/husam-tariq/filament-database-schedule/blob/v2.0.0/src/Filament/Columns/ActionGroup.php
 */
=======
>>>>>>> 21140ac (first)

declare(strict_types=1);

namespace Modules\Job\Filament\Columns;

use Filament\Actions\Concerns\InteractsWithRecord;
use Filament\Tables\Actions\ActionGroup as ActionsActionGroup;
use Illuminate\Database\Eloquent\Model;

/**
<<<<<<< HEAD
 * @property Model $record
=======
 *  @property  Model $record
>>>>>>> 21140ac (first)
 */
class ActionGroup extends ActionsActionGroup
{
    use InteractsWithRecord;
<<<<<<< HEAD

    public const ICON_BUTTON_VIEW = 'job::components.action-group';

    protected string $view = 'job::components.action-group';

=======
    public const ICON_BUTTON_VIEW = 'filament-database-schedule::components.action-group';
    protected string $view = 'filament-database-schedule::components.action-group';
>>>>>>> 21140ac (first)
    public function getActions(): array
    {
        return [];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 21140ac (first)
