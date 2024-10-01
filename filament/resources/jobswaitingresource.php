<?php
/**
 * @see https://github.com/mooxphp/jobs/blob/main/src/Resources/JobsWaitingResource.php
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
// use Modules\Job\JobsWaitingPlugin;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Job\Filament\Resources\JobsWaitingResource\Pages\ListJobsWaiting;
use Modules\Job\Filament\Resources\JobsWaitingResource\Widgets\JobsWaitingOverview;
use Modules\Job\Models\Job;
use Modules\Xot\Filament\Resources\XotBaseResource;

class JobsWaitingResource extends XotBaseResource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-pause';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    TextInput::make('job_id')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('name')
                        ->maxLength(255),
                    TextInput::make('queue')
                        ->maxLength(255),
                    DateTimePicker::make('started_at'),
                    DateTimePicker::make('finished_at'),
                    Toggle::make('failed')
                        ->required(),
                    TextInput::make('attempt')
                        ->required(),
                    Textarea::make('exception_message')
                        ->maxLength(65535),
                ]
            );
    }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns(
    //             [
    //                 TextColumn::make('status')
    //                     ->badge()
    //                     ->label(static::trans('fields.status'))
    //                     ->sortable()
    //                     // ->formatStateUsing(static fn (string $state): string => __("jobs::translations.{$state}"))
    //                     ->color(
    //                         static fn (string $state): string => match ($state) {
    //                             'running' => 'primary',
    //                             'waiting' => 'success',
    //                             'failed' => 'danger',
    //                             default => 'secondary',
    //                         }
    //                     ),
    //                 TextColumn::make('display_name')
    //                     ->label(static::trans('fields.display_name'))
    //                     ->sortable(),
    //                 TextColumn::make('queue')
    //                     ->label(static::trans('fields.queue'))
    //                     ->sortable(),
    //                 TextColumn::make('attempts')
    //                     ->label(static::trans('fields.attempts'))
    //                     ->sortable(),
    //                 TextColumn::make('reserved_at')
    //                     ->label(static::trans('fields.reserved_at'))
    //                     ->since()
    //                     ->sortable(),
    //                 TextColumn::make('created_at')
    //                     ->label(static::trans('fields.created_at'))
    //                     ->since()
    //                     ->sortable(),
    //             ]
    //         )
    //         ->defaultSort('id', 'asc')
    //         ->bulkActions(
    //             [
    //                 DeleteBulkAction::make(),
    //             ]
    //         );
    // }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJobsWaiting::route('/'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            JobsWaitingOverview::class,
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    /*
    public static function getNavigationBadge(): ?string {
        return JobsWaitingPlugin::make()->getNavigationCountBadge() ? number_format(static::getModel()::count()) : null;
    }

    public static function getModelLabel(): string {
        return JobsWaitingPlugin::make()->getLabel();
    }

    public static function getPluralModelLabel(): string {
        return JobsWaitingPlugin::make()->getPluralLabel();
    }

    public static function getNavigationGroup(): ?string {
        return JobsWaitingPlugin::make()->getNavigationGroup();
    }

    public static function getNavigationSort(): ?int {
        return JobsWaitingPlugin::make()->getNavigationSort();
    }

    public static function getBreadcrumb(): string {
        return JobsWaitingPlugin::make()->getBreadcrumb();
    }

    public static function shouldRegisterNavigation(): bool {
        return JobsWaitingPlugin::make()->shouldRegisterNavigation();
    }

    public static function getNavigationIcon(): string {
        return JobsWaitingPlugin::make()->getNavigationIcon();
    }
    */

    /*
    public static function getNavigationLabel(): string {
        return Str::title(static::getPluralModelLabel());
    }
    */
}
