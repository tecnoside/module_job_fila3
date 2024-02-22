<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Pages;

use Filament\Forms;
use Filament\Resources\Concerns\HasTabs;
use Filament\Resources\Pages\Concerns\HasRelationManagers;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Support\HtmlString;
use Livewire\Attributes\Url;
use Modules\Job\Filament\Resources\ScheduleResource;

class ViewSchedule extends Page implements HasTable
{
    use InteractsWithRecord;
    use HasRelationManagers;
    use HasTabs;
    use Forms\Concerns\InteractsWithForms;
    use Tables\Concerns\InteractsWithTable {
        makeTable as makeBaseTable;
    }
    use Tables\Concerns\InteractsWithTable {
        makeTable as makeBaseTable;
    }
    #[Url]
    public ?string $activeTab = null;
    protected static string $resource = ScheduleResource::class;
    protected static string $view = 'filament-panels::resources.pages.list-records';

    public function getTitle(): string
    {
        return __('job::schedule.resource.history');
    }
    protected function getHeaderActions(): array
    {
        return [];
    }

    /*
     * Undocumented function
     *
     * @param string $record
     * @return void

    public function mount($record): void
    {
        static::authorizeResourceAccess();

        $this->record = $this->resolveRecord($record);

        abort_unless(static::getResource()::canView($this->getRecord()), 403);
    }

    protected function getRelationManagers(): array
    {
        return [];
    }


    protected function getTableQuery(): Builder
    {
        return ScheduleHistory::where('schedule_id', $this->record->id)->latest();
    }
    */

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\Layout\Split::make([
                Tables\Columns\TextColumn::make('command')->label(__('job::schedule.fields.command')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('job::schedule.fields.expression'))
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('job::schedule.fields.expression'))
                    ->formatStateUsing(static function ($state, $record) {
                        if ($state === $record->created_at) {
                            return 'Processing...';
                        }
                        return $state->diffInSeconds($record->created_at) . ' seconds';
                    }),
                Tables\Columns\TextColumn::make('output')
                    ->label('Output lines')
                    ->formatStateUsing(static function ($state) {
                        return (count(explode('<br />', nl2br($state))) - 1) . ' rows of output';
                    }),
            ]), Tables\Columns\Layout\Panel::make([

                Tables\Columns\TextColumn::make('output')->extraAttributes(['class' => '!max-w-max'], true)
                    ->formatStateUsing(static function ($state) {
                        return new HtmlString(nl2br($state));
                    }),

            ])->collapsible()
            //->collapsed(config('job::history_collapsed'))
            ,
        ];
    }
}