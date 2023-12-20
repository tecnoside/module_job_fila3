<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\FailedJobResource\Pages;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Artisan;
use Modules\Job\Filament\Resources\FailedJobResource;
use Modules\Job\Models\FailedJob;

class ListFailedJobs extends ListRecords
{
    protected static string $resource = FailedJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('retry_all')
                ->label('Retry all failed Jobs')
                ->requiresConfirmation()
                ->action(function (): void {
                    Artisan::call('queue:retry all');
                    Notification::make()
                        ->title('All failed jobs have been pushed back onto the queue.')
                        ->success()
                        ->send();
                }),

            Action::make('delete_all')
                ->label('Delete all failed Jobs')
                ->requiresConfirmation()
                ->color('danger')
                ->action(function (): void {
                    FailedJob::truncate();
                    Notification::make()
                        ->title('All failed jobs have been removed.')
                        ->success()
                        ->send();
                }),
        ];
    }
}
