<?php
/**
 * @see https://gitlab.com/amvisor/filament-failed-jobs/-/blob/master/src/Resources/JobBatchesResource/Pages/ListJobBatches.php?ref_type=heads
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobBatchResource\Pages;

use Filament\Tables\Table;
use Filament\Actions\Action;
use Webmozart\Assert\Assert;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Artisan;
use Filament\Notifications\Notification;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Enums\ActionsPosition;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Xot\Filament\Pages\XotBaseListRecords;
use Modules\Job\Filament\Resources\JobBatchResource;

class ListJobBatches extends XotBaseListRecords
{
    
    protected static string $resource = JobBatchResource::class;

    public function table(Table $table): Table
    {
        return $table
            // ->columns($this->getTableColumns())
            ->columns($this->layoutView->getTableColumns())
            ->contentGrid($this->layoutView->getTableContentGrid())
            ->headerActions($this->getTableHeaderActions())

            ->filters($this->getTableFilters())
            ->filtersLayout(FiltersLayout::AboveContent)
            ->persistFiltersInSession()
            ->actions($this->getTableActions())
            ->bulkActions($this->getTableBulkActions())
            ->actionsPosition(ActionsPosition::BeforeColumns)
            ->defaultSort(
                column: 'created_at',
                direction: 'DESC',
            );
    }

    public function getGridTableColumns(): array
    {
        return [
        ];
    }

    public function getListTableColumns(): array
    {
        Assert::string($date_format = config('app.date_format'), '['.__LINE__.']['.class_basename(__CLASS__).']');

        return [
            TextColumn::make('created_at')
                ->dateTime($date_format)
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('id')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('name')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('cancelled_at')
                ->dateTime($date_format)
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('failed_at')
                ->dateTime($date_format)
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('finished_at')
                ->dateTime($date_format)
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('total_jobs')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('pending_jobs')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('failed_jobs')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('failed_job_ids')
                ->sortable()
                ->searchable()
                ->toggleable(),
        ];
    }

    public function getTableActions(): array
    {
        return [
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('prune_batches')
                ->label('Prune all batches')
                ->requiresConfirmation()
                ->color('danger')
                ->action(
                    static function (): void {
                        Artisan::call('queue:prune-batches');
                        Notification::make()
                            ->title('All batches have been pruned.')
                            ->success()
                            ->send();
                    }
                ),
        ];
    }
}
