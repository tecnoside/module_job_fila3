<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ImportResource\Pages;

use Filament\Tables;
use Filament\Actions;
use Filament\Tables\Table;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Filament\Traits\TransTrait;
use Modules\Job\Filament\Resources\ImportResource;
use Modules\Xot\Filament\Pages\XotBaseListRecords;

class ListImports extends XotBaseListRecords
{
    
    protected static string $resource = ImportResource::class;

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),

            TextColumn::make('completed_at'),
            TextColumn::make('file_name'),
            // TextColumn::make('file_path'),
            TextColumn::make('importer'),
            TextColumn::make('processed_rows'),
            TextColumn::make('total_rows'),
            TextColumn::make('successful_rows'),
            // TextColumn::make('user_id'),
            // TextColumn::make('user_type'),
        ];
    }

    public function getTableFilters(): array
    {
        return [
        ];
    }

    public function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            // Tables\Actions\BulkActionGroup::make([
            Tables\Actions\DeleteBulkAction::make(),
            // ]),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns($this->getTableColumns())
            ->filters($this->getTableFilters())
            ->actions($this->getTableActions())
            ->bulkActions($this->getTableBulkActions());
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
