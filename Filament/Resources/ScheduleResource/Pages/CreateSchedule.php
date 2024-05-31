<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Pages;

use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Xot\Filament\Traits\NavigationPageLabelTrait;

class CreateSchedule extends CreateRecord
{
    use NavigationPageLabelTrait;
    protected static string $resource = ScheduleResource::class;

    public Collection $commands;

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getformSchema(): array
    {
        return $this->getResource()::getFormSchema();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema());
    }
}
