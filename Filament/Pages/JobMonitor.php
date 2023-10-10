<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Pages;

use Modules\Xot\Filament\Pages\XotBasePage;

class JobMonitor extends XotBasePage
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
