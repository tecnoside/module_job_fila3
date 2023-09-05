<?php

declare(strict_types=1);

namespace Modules\Job\Http\Livewire\Auth;

use Savannabits\FilamentModules\Http\Livewire\Auth\BaseLogin;

final class FilamentLogin extends BaseLogin
{
    public static string $context = 'filament';
    
    public static string $module = 'Job';
}
