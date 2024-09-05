<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Columns;

use Filament\Tables\Columns\TextColumn;
use Webmozart\Assert\Assert;

class ScheduleArguments extends TextColumn
{
    protected string $view = 'job::filament.columns.schedule-arguments';

    protected bool $withValue = true;

    public function withValue(bool $withValue = true): static
    {
        $this->withValue = $withValue;

        return $this;
    }

    public function getTags(): array
    {
        $tags = $this->getState();
        if (is_array($tags)) {
            if ($this->withValue) {
                return collect($tags)->reject(static fn ($value): bool => empty($value['value']))->map(static fn ($value, $key): string => ($value['name'] ?? $key).'='.$value['value'])->toArray();
            }

            return collect($tags)->map(static fn ($value, $key): string => $key.'='.$value)->toArray();
        }

        if (($separator = $this->getSeparator()) === null || ($separator = $this->getSeparator()) === '' || ($separator = $this->getSeparator()) === '0') {
            return [];
        }

        Assert::string($tags, '['.__LINE__.']['.__FILE__.']');
        $tags = explode($separator, $tags);
        if (count($tags) === 1 && blank($tags[0])) {
            return [];
        }

        return $tags;
    }
}
