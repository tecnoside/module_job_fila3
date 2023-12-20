<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobBatchResource\Pages;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Artisan;
use Modules\Job\Filament\Resources\JobBatchResource;

class ListJobBatches extends ListRecords
{
    protected static string $resource = JobBatchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('prune_batches')
                ->label('Prune all batches')
                ->requiresConfirmation()
                ->color('danger')
                ->action(function (): void {
                    Artisan::call('queue:prune-batches');
                    Notification::make()
                        ->title('All batches have been pruned.')
                        ->success()
                        ->send();
                }),
        ];
    }
}
