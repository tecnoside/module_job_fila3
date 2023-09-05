<?php

declare(strict_types=1);

namespace Modules\Job\Providers\Filament;

use Modules\Xot\Providers\Filament\XotBasePanelProvider;

final class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Job';
}
