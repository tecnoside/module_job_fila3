<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use InvadersXX\FilamentJsoneditor\Forms\JSONEditor;
use Modules\Job\Filament\Resources\FailedJobResource\Pages\ListFailedJobs;
// use Modules\Job\Filament\Resources\FailedJobsResource\Pages\ListFailedJobs;
use Modules\Job\Models\FailedJob;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Webmozart\Assert\Assert;

class FailedJobResource extends XotBaseResource
{
    // //

    protected static ?string $model = FailedJob::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';

    // protected static ?string $navigationGroup = 'jobs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('uuid')->disabled()->columnSpan(4),
                TextInput::make('failed_at')->disabled(),
                TextInput::make('id')->disabled(),
                TextInput::make('connection')->disabled(),
                TextInput::make('queue')->disabled(),

                // make text a little bit smaller because often a complete Stack Trace is shown:
                TextArea::make('exception')->disabled()->columnSpan(4)->extraInputAttributes(['style' => 'font-size: 80%;']),
                JSONEditor::make('payload')->disabled()->columnSpan(4),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('id')->sortable()->searchable()->toggleable(),
                TextColumn::make('failed_at')->sortable()->searchable(false)->toggleable(),
                TextColumn::make('exception')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->wrap()
                    ->limit(200)
                    ->tooltip(fn (FailedJob $failedJob): string => sprintf('%s UUID: %s; Connection: %s; Queue: %s;', $failedJob->failed_at, $failedJob->uuid, $failedJob->connection, $failedJob->queue)),
                TextColumn::make('uuid')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('connection')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('queue')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->bulkActions([
                DeleteBulkAction::make(),
                BulkAction::make('retry')
                    ->label('Retry')
                    ->requiresConfirmation()
                    ->action(function (Collection $collection): void {
                        foreach ($collection as $record) {
                            // Cannot access property $uuid on mixed.
                            Assert::isInstanceOf($record, FailedJob::class);
                            Artisan::call(sprintf('queue:retry %s', $record->uuid));
                        }
                        Notification::make()
                            ->title(sprintf('%d jobs have been pushed back onto the queue.', $collection->count()))
                            ->success()
                            ->send();
                    }),
            ])
            ->actions([
                DeleteAction::make('Delete'),
                ViewAction::make('View'),
                Action::make('retry')
                    ->label('Retry')
                    ->requiresConfirmation()
                    ->action(function (FailedJob $failedJob): void {
                        Artisan::call(sprintf('queue:retry %s', $failedJob->uuid));
                        Notification::make()
                            ->title(sprintf("The job with uuid '%s' has been pushed back onto the queue.", $failedJob->uuid))
                            ->success()
                            ->send();
                    }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFailedJobs::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) FailedJob::query()->count();
    }
}
