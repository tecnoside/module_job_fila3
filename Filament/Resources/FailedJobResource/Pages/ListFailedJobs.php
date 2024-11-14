<?php
/**
 * @see https://gitlab.com/amvisor/filament-failed-jobs/-/blob/master/src/Resources/FailedJobsResource/Pages/ListFailedJobs.php?ref_type=heads
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\FailedJobResource\Pages;

use Filament\Actions\Action;
use Modules\Job\Models\FailedJob;
use Illuminate\Support\Facades\Artisan;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Filament\Pages\XotBaseListRecords;
use Modules\Job\Filament\Resources\FailedJobResource;

class ListFailedJobs extends XotBaseListRecords
{
    protected static string $resource = FailedJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('retry_all')
                ->label('Retry all failed Jobs')
                ->requiresConfirmation()
                ->action(
                    static function (): void {
                        Artisan::call('queue:retry all');
                        Notification::make()
                            ->title('All failed jobs have been pushed back onto the queue.')
                            ->success()
                            ->send();
                    }
                ),

            Action::make('delete_all')
                ->label('Delete all failed Jobs')
                ->requiresConfirmation()
                ->color('danger')
                ->action(
                    static function (): void {
                        FailedJob::truncate();
                        Notification::make()
                            ->title('All failed jobs have been removed.')
                            ->success()
                            ->send();
                    }
                ),
        ];
    }
}
