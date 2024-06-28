<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Columns;

use Filament\Tables\Columns\TextColumn;

class ScheduleOptions extends TextColumn
{
    protected bool $withValue = true;
<<<<<<< HEAD

    public function withValue(bool $withValue = true): static
    {
        $this->withValue = $withValue;

=======
    public function withValue(bool $withValue = true): static
    {
        $this->withValue = $withValue;
>>>>>>> 21140ac (first)
        return $this;
    }

    public function getTags(): array
    {
        /*
        if($this->record==null){
            return [];
        }
        if($this->withValue)
        return $this->record->getOptions();
        else{
            return parent::getTags();
        }
        */
        return [];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 21140ac (first)
