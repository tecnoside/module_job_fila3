<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Pages;

use Filament\Pages\Page;

class JobMonitor extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static string $view = 'job::filament.pages.job-monitor';

    // public function mount(): void {
    //     $user = auth()->user();
    //     if(!$user->hasRole('super-admin')){
    //         redirect('/admin');
    //     }
    // }
}
