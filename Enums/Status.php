<?php

declare(strict_types=1);

namespace Modules\Job\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

<<<<<<< HEAD
enum Status: string implements HasColor, HasIcon, HasLabel
=======
enum Status: string implements HasIcon, HasColor, HasLabel
>>>>>>> 21140ac (first)
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Trashed = 'trashed';
<<<<<<< HEAD
    case One = '1';
=======
>>>>>>> 21140ac (first)

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Active => 'success',
            self::Inactive => 'warning',
            self::Trashed => 'danger',
<<<<<<< HEAD
            self::One => 'danger',
=======
>>>>>>> 21140ac (first)
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Active => 'heroicon-o-check-circle',
            self::Inactive => 'heroicon-o-document',
            self::Trashed => 'heroicon-o-x-circle',
<<<<<<< HEAD
            self::One => 'heroicon-o-x-circle',
=======
>>>>>>> 21140ac (first)
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Active => __('job::schedule.status.active'),
            self::Inactive => __('job::schedule.status.inactive'),
            self::Trashed => __('job::schedule.status.trashed'),
<<<<<<< HEAD
            self::One => __('job::schedule.status.one'),
        };
    }
}
=======
        };
    }
}
>>>>>>> 21140ac (first)
