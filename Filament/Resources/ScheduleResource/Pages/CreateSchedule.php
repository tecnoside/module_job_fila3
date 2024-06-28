<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Pages;

<<<<<<< HEAD
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

=======
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;
use Modules\Job\Filament\Resources\ScheduleResource;

class CreateSchedule extends CreateRecord
{
    protected static string $resource = ScheduleResource::class;
>>>>>>> 21140ac (first)
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
<<<<<<< HEAD

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
=======
}
>>>>>>> 21140ac (first)
