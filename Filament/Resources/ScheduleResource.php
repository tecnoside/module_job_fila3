<?php
<<<<<<< HEAD
/**
 * @see https://github.com/husam-tariq/filament-database-schedule/blob/main/src/Filament/Resources/ScheduleResource.php
 */
=======
>>>>>>> 21140ac (first)

declare(strict_types=1);

namespace Modules\Job\Filament\Resources;

<<<<<<< HEAD
use Filament\Forms\Components\Card;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
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
=======
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Modules\Job\Filament\Resources\ScheduleResource\Pages;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ScheduleResource extends XotBaseResource
{
    public static Collection $commands;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    /*
        public static function getModel(): string
        {
            return  config('job::model');
        }

        public static function getNavigationIcon(): ?string
        {
            return config('job::navigation_icon');
        }

        public static function getPluralModelLabel(): string
        {
            return __('job::schedule.resource.plural');
        }

        public static function getModelLabel(): string
        {
            return __('job::schedule.resource.single');
        }

        public static function getNavigationGroup(): ?string
        {
            return __('job::schedule.resource.navigation');
        }

        public static function getSlug(): string
        {
            return config('job::route_slug');
        }
        */

    public static function form(Form $form): Form
    {
        return $form;
        /*
                static::$commands = CommandService::get();
                return $form
                    ->schema([
                        Section::make([
                            Forms\Components\Select::make('command')->label(__('job::schedule.fields.command'))
                                ->options(
                                    fn () =>
                                    config('job::commands.enable_custom') ?
                                        static::$commands->pluck('full_name', 'name')->prepend(__('job::schedule.messages.custom'), 'custom') : static::$commands->pluck('full_name', 'name')
                                )
                                ->reactive()
                                ->searchable()
                                ->required()
                                ->afterStateUpdated(function ($set, $state) {
                                    //Cannot access property $arguments on mixed.
                                 //   $set('params', static::$commands->firstWhere('name', $state)?->arguments ?? []);
                                    // $set('options_with_value', static::$commands->firstWhere('name', $state)?->options["withValue"] ?? []);
                                }),
                            Forms\Components\TextInput::make('command_custom')
                                ->placeholder(__('job::schedule.messages.custom-command-here'))
                                ->label(__('job::schedule.messages.custom'))
                                ->required()
                                ->visible(fn ($get) => $get('command') === 'custom' && config('job::commands.enable_custom')),
                            //TableRepeater::make('params')->label(__('job::schedule.fields.arguments'))
                            Forms\Components\Repeater::make('params')->label(__('job::schedule.fields.arguments'))
                                ->schema([
                                    Forms\Components\TextInput::make('value')->label(fn ($get) => ucfirst($get('name')))->required(fn ($get) => $get('required')),
                                    Forms\Components\Hidden::make('name'),
                                ])->addable(false)
                                    //->withoutHeader() //Method Filament\Forms\Components\Repeater::withoutHeader does not exist
                                    ->deletable(false)
                                    ->reorderable(false)
                                ->columnSpan('full')
                                //->visible(fn ($get) => !empty(static::$commands->firstWhere('name', $get('command'))['arguments']))
                                ,
                            //TableRepeater::make('options_with_value')->label(__('job::schedule.fields.options_with_value'))
                            Forms\Components\Repeater::make('options_with_value')->label(__('job::schedule.fields.options_with_value'))
                                ->schema([
                                    Forms\Components\TextInput::make('value')->label(fn ($get) => ucfirst($get('name')))->required(fn ($get) => $get('required')),
                                    Forms\Components\Hidden::make('type')->default('string'),
                                    Forms\Components\Hidden::make('name'),
                                ])->addable(false)
                                //->withoutHeader()//Method Filament\Forms\Components\Repeater::withoutHeader does not exist
                                ->deletable(false)
                                ->reorderable(false)
                                ->default([])
                                ->columnSpan('full')->visible(fn ($state) => !empty($state)),
                            Forms\Components\CheckboxList::make('options')->label(__('job::schedule.fields.options'))
                                ->options(
                                    fn ($get) =>
                                    collect(static::$commands->firstWhere('name', $get('command'))['options']['withoutValue'] ?? [])
                                        ->mapWithKeys(function ($value) {
                                            return [$value => $value];
                                        }),
                                )->columns(3)
                                ->columnSpanFull()
                                ->visible(fn (Forms\Components\CheckboxList $component) => !empty($component->getOptions())),
                            Forms\Components\TextInput::make('expression')
                                ->placeholder('* * * * *')
                                ->rules([new Corn()])
                                ->label(__('job::schedule.fields.expression'))
                                ->required()
                                ->helperText(fn () => config('job::tool-help-cron-expression.enable') ? new HtmlString(" <a href='" . config('job::tool-help-cron-expression.url') . "' target='_blank'>" . __('job::schedule.messages.help-cron-expression') . " </a>") : null),
                            Forms\Components\TagsInput::make('environments')
                                ->placeholder(null)
                                ->label(__('job::schedule.fields.environments')),
                            Forms\Components\TextInput::make('log_filename')
                                ->label(__('job::schedule.fields.log_filename'))
                                ->helperText(__('job::schedule.messages.help-log-filename')),
                            Forms\Components\TextInput::make('webhook_before')
                                ->label(__('job::schedule.fields.webhook_before')),
                            Forms\Components\TextInput::make('webhook_after')
                                ->label(__('job::schedule.fields.webhook_after')),
                            Forms\Components\TextInput::make('email_output')
                                ->label(__('job::schedule.fields.email_output')),
                            Forms\Components\Toggle::make('sendmail_success')
                                ->label(__('job::schedule.fields.sendmail_success')),
                            Forms\Components\Toggle::make('sendmail_error')
                                ->label(__('job::schedule.fields.sendmail_error')),
                            Forms\Components\Toggle::make('log_success')
                                ->label(__('job::schedule.fields.log_success'))->default(true),
                            Forms\Components\Toggle::make('log_error')
                                ->label(__('job::schedule.fields.log_error'))->default(true),
                            Forms\Components\Toggle::make('even_in_maintenance_mode')
                                ->label(__('job::schedule.fields.even_in_maintenance_mode')),
                            Forms\Components\Toggle::make('without_overlapping')
                                ->label(__('job::schedule.fields.without_overlapping')),
                            Forms\Components\Toggle::make('on_one_server')
                                ->label(__('job::schedule.fields.on_one_server')),
                            Forms\Components\Toggle::make('run_in_background')
                                ->label(__('job::schedule.fields.run_in_background')),
                        ])->inlineLabel(false)
                    ]);
                    */
    }

    public static function table(Table $table): Table
    {
        return $table;
        /*
                return $table
                    ->columns([
                        Tables\Columns\TextColumn::make('command')->getStateUsing(function ($record) {
                            if ($record->command == 'custom')
                                return $record->command_custom;
                            return $record->command;
                        })->label(__('job::schedule.fields.command'))->searchable()->sortable(),
                        ScheduleArguments::make('params')->label(__('job::schedule.fields.arguments'))->searchable()->sortable(),
                        Tables\Columns\TextColumn::make('options')->label(__('job::schedule.fields.options'))->searchable()->sortable()->getStateUsing(fn(Model $record)=>$record->getOptions())->separator(',')->badge(),
                        Tables\Columns\TextColumn::make('expression')->label(__('job::schedule.fields.expression'))->searchable()->sortable(),
                        Tables\Columns\TextColumn::make('environments')->label(__('job::schedule.fields.environments'))->separator(',')->searchable()->sortable()->badge()->toggleable(isToggledHiddenByDefault: false),
                        Tables\Columns\TextColumn::make('status')
                            ->label(__('job::schedule.fields.status'))
                            ->searchable()
                            ->sortable()
                            ->toggleable(isToggledHiddenByDefault: false),
                        Tables\Columns\TextColumn::make('created_at')->label(__('job::schedule.fields.created_at'))->searchable()->sortable()
                            ->dateTime(config('app.date_format'))->wrap()->toggleable(isToggledHiddenByDefault: true),
                        Tables\Columns\TextColumn::make('updated_at')->getStateUsing(fn ($record) => $record->created_at == $record->updated_at ? __('job::schedule.fields.never') : $record->updated_at)
                            ->wrap()->formatStateUsing(static function (Column $column, $state): ?string {
                                $format ??= Table::$defaultDateTimeDisplayFormat;

                                if (blank($state) || $state == __('job::schedule.fields.never')) {
                                    return $state;
                                }

                                return Carbon::parse($state)
                                    ->setTimezone($timezone ?? $column->getTimezone())
                                    ->translatedFormat($format);
                            })->label(__('job::schedule.fields.updated_at'))->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),


                    ])
                    ->filters([
                        Tables\Filters\TrashedFilter::make()
                    ])
                    ->actions([
                        ActionGroup::make([
                            Tables\Actions\EditAction::make()->hidden(fn ($record) => $record->trashed())->tooltip(__('filament-actions::edit.single.label')),
                            Tables\Actions\RestoreAction::make()->tooltip(__('filament-actions::restore.single.label')),
                            Tables\Actions\DeleteAction::make()->tooltip(__('filament-actions::delete.single.label')),
                            Tables\Actions\ForceDeleteAction::make()->tooltip(__('filament-support::actions/force-delete.single.label')),
                            Tables\Actions\Action::make('toggle')
                                ->disabled(fn ($record) => $record->trashed())
                                ->icon(fn ($record) => $record->status === Status::Active ? 'schedule-pause-fill' : 'schedule-play-fill')
                                ->color(fn ($record) => $record->status === Status::Active ? 'warning' : 'success')
                                ->action(function ($record): void {
                                    if ($record->status === Status::Active)
                                        $record->status = Status::Inactive;
                                    else if ($record->status === Status::Inactive)
                                        $record->status = Status::Active;
                                    $record->save();
                                })->tooltip(fn ($record) => $record->status === Status::Active ? __('job::schedule.buttons.inactivate') : __('job::schedule.buttons.activate')),
                            Tables\Actions\ViewAction::make()->icon('schedule-history')->color('gray')->tooltip(__('job::schedule.buttons.history')),
                        ])

                    ])
                    ->defaultPaginationPageOption(config('job::per_page', 10) ?: config('tables.pagination.default_records_per_page'))
                    ->bulkActions([
                        Tables\Actions\DeleteBulkAction::make(),
                    ])->defaultSort(config('job::default_ordering'), config('job::default_ordering_direction'));

                    */
    }
>>>>>>> 21140ac (first)

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
<<<<<<< HEAD
            'index' => ListSchedules::route('/'),
            'create' => CreateSchedule::route('/create'),
            'edit' => EditSchedule::route('/{record}/edit'),
            'view' => ViewSchedule::route('/{record}'),
=======
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
            'view' => Pages\ViewSchedule::route('/{record}'),
>>>>>>> 21140ac (first)
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }
<<<<<<< HEAD

    public static function getFormSchema(): array
    {
        static::$commands = app(GetCommandsAction::class)->execute();
        $commands_opts = static::$commands->toCollection()->pluck('full_name', 'name')->toArray();

        return [
            Card::make([
                Select::make('command')
                    ->label(static::trans('fields.command'))
                    /*
                    ->options(
                        fn () => config('filament-database-schedule.commands.enable_custom') ?
                            static::$commands->pluck('full_name', 'name')
                            ->prepend(static::trans('messages.custom'), 'custom') : static::$commands->pluck('full_name', 'name')
                    )
                    */
                    ->options(fn () => $commands_opts)
                    ->reactive()
                    ->searchable()
                    ->required()
                    ->afterStateUpdated(function (Set $set, $state) {
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
                    ->visible(fn (Get $get) => 'custom' === $get('command') && config('filament-database-schedule.commands.enable_custom')),
                Repeater::make('params')
                    ->schema([
                        Hidden::make('name'),
                        TextInput::make('value')
                            ->label(fn (Get $get) => $get('name'))
                            ->required(fn (Get $get) => $get('required')),
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
                            ->label(fn (Get $get) => $get('name'))
                            ->required(fn (Get $get) => $get('required')),
                    ])
                    ->addable(false)
                    ->deletable(false)
                    ->reorderable(false),
                /*
                CheckboxList::make('options')
                 ->label(static::trans('fields.options'))
                    ->options(
                        fn (Get $get) => collect(static::$commands->firstWhere('name', $get('command'))['options']['withoutValue'] ?? [])
                            ->mapWithKeys(function ($value) {
                                return [$value => $value];
                            }),
                    )
                 ->columns(3)
                 ->columnSpanFull()
                 ->visible(fn (CheckboxList $component) => ! empty($component->getOptions())),
                */
                TextInput::make('expression')
                    ->placeholder('* * * * *')
                    ->rules([new Corn()])
                    ->label(static::trans('fields.expression'))
                    ->required()
                    ->helperText(fn () => config('filament-database-schedule.tool-help-cron-expression.enable') ? new HtmlString(" <a href='".config('filament-database-schedule.tool-help-cron-expression.url')."' target='_blank'>".static::trans('messages.help-cron-expression').' </a>') : null),
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
    }
=======
>>>>>>> 21140ac (first)
}
