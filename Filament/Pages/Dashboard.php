<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Pages;

use Filament\Pages\Page;


class Dashboard extends Page
{
    //
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'job::filament.pages.dashboard';
}
