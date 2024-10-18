<?php
/**
 * @see https://github.com/husam-tariq/filament-database-schedule/blob/main/src/Filament/Resources/ScheduleResource.php
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Modules\Job\Actions\Command\GetCommandsAction;
use Modules\Job\Datas\CommandData;
use Modules\Job\Filament\Resources\ScheduleResource\Pages\CreateSchedule;
use Modules\Job\Filament\Resources\ScheduleResource\Pages\EditSchedule;
use Modules\Job\Filament\Resources\ScheduleResource\Pages\ListSchedules;
use Modules\Job\Filament\Resources\ScheduleResource\Pages\ViewSchedule;
use Modules\Job\Models\Schedule;
use Modules\Job\Rules\Corn;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Spatie\LaravelData\DataCollection;
use Webmozart\Assert\Assert;

class ScheduleResource extends XotBaseResource
{
    protected static ?string $model = Schedule::class;

    protected static bool $shouldRegisterNavigation = true;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    /** @var DataCollection<CommandData> */
    protected static DataCollection $commands;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSchedules::route('/'),
            'create' => CreateSchedule::route('/create'),
            'edit' => EditSchedule::route('/{record}/edit'),
            'view' => ViewSchedule::route('/{record}'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    public static function getFormSchema(): array
    {
        // --- occorre aggiornare getCOmmandsAction per laravel 11 che ah rimosso il kernel
        return [];
        /*
        static::$commands = app(GetCommandsAction::class)->execute();

        $commands_opts = static::$commands->toCollection()->pluck('full_name', 'name')->toArray();

        return [
            Section::make([
                Select::make('command')
                    ->label(static::trans('fields.command'))

                    // ->options(
                    //     fn () => config('filament-database-schedule.commands.enable_custom') ?
                    //         static::$commands->pluck('full_name', 'name')
                    //         ->prepend(static::trans('messages.custom'), 'custom') : static::$commands->pluck('full_name', 'name')
                    // )

                    ->options(fn () => $commands_opts)
                    ->reactive()
                    ->searchable()
                    ->required()
                    ->afterStateUpdated(function (Set $set, $state): void {
                        Assert::isInstanceOf($command = static::$commands->where('name', $state)->first(), CommandData::class);
                        // $params = static::$commands->firstWhere('name', $state)['arguments'] ?? [];
                        // $options_with_value = static::$commands->firstWhere('name', $state)['options']['withValue'] ?? [];
                        $params = $command->arguments;
                        $options_with_value = $command->options['withValue'] ?? [];
                        // ['options']['withValue'] ?? [];
                        $set('params', $params);
                        $set('options_with_value', $options_with_value);
                    }),
                TextInput::make('command_custom')
                    ->placeholder(static::trans('messages.custom-command-here'))
                    ->label(static::trans('messages.custom'))
                    ->required()
                    ->visible(fn (Get $get): bool => 'custom' === $get('command') && config('filament-database-schedule.commands.enable_custom')),
                Repeater::make('params')
                    ->schema([
                        Hidden::make('name'),
                        TextInput::make('value')
                            ->label(fn (Get $get): mixed => $get('name'))
                            ->required(fn (Get $get): mixed => $get('required')),
                    ])
                    ->addable(false)
                    ->deletable(false)
                    ->reorderable(false),

                Repeater::make('options_with_value')
                    ->schema([
                        Hidden::make('name'),
                        Hidden::make('type')
                            ->default('string'),
                        TextInput::make('value')
                            ->label(fn (Get $get): mixed => $get('name'))
                            ->required(fn (Get $get): mixed => $get('required')),
                    ])
                    ->addable(false)
                    ->deletable(false)
                    ->reorderable(false),

                // CheckboxList::make('options')
                //  ->label(static::trans('fields.options'))
                //     ->options(
                //         fn (Get $get) => collect(static::$commands->firstWhere('name', $get('command'))['options']['withoutValue'] ?? [])
                //             ->mapWithKeys(function ($value) {
                //                 return [$value => $value];
                //             }),
                //     )
                //  ->columns(3)
                //  ->columnSpanFull()
                //  ->visible(fn (CheckboxList $component) => ! empty($component->getOptions())),

                TextInput::make('expression')
                    ->placeholder('* * * * *')
                    ->rules([new Corn()])
                    ->label(static::trans('fields.expression'))
                    // ->helperText(fn (): ?\Illuminate\Support\HtmlString => config('filament-database-schedule.tool-help-cron-expression.enable') ? new HtmlString(" <a href='".config('filament-database-schedule.tool-help-cron-expression.url')."' target='_blank'>".static::trans('messages.help-cron-expression').' </a>') : null)
                    ->required(),
                TagsInput::make('environments')
                    ->placeholder(null)
                    ->label(static::trans('fields.environments')),
                TextInput::make('log_filename')
                    ->label(static::trans('fields.log_filename'))
                    ->helperText(static::trans('messages.help-log-filename')),
                TextInput::make('webhook_before')
                    ->label(static::trans('fields.webhook_before')),
                TextInput::make('webhook_after')
                    ->label(static::trans('fields.webhook_after')),
                TextInput::make('email_output')
                    ->label(static::trans('fields.email_output')),
                Toggle::make('sendmail_success')
                    ->label(static::trans('fields.sendmail_success')),
                Toggle::make('sendmail_error')
                    ->label(static::trans('fields.sendmail_error')),
                Toggle::make('log_success')
                    ->label(static::trans('fields.log_success'))
                    ->default(true),
                Toggle::make('log_error')
                    ->label(static::trans('fields.log_error'))
                    ->default(true),
                Toggle::make('even_in_maintenance_mode')
                    ->label(static::trans('fields.even_in_maintenance_mode')),
                Toggle::make('without_overlapping')
                    ->label(static::trans('fields.without_overlapping')),
                Toggle::make('on_one_server')
                    ->label(static::trans('fields.on_one_server')),
                Toggle::make('run_in_background')
                    ->label(static::trans('fields.run_in_background')),
            ])
                ->inlineLabel(false),
        ];
        */
    }
}
