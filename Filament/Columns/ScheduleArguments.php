<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Columns;

use Filament\Tables\Columns\TextColumn;
use Webmozart\Assert\Assert;

class ScheduleArguments extends TextColumn
{
    protected string $view = 'job::filament.columns.schedule-arguments';

    protected bool $withValue = true;

    /**
     * Set whether to include values in the output.
<<<<<<< HEAD
     *
     * @param bool $withValue
     * @return static
=======
>>>>>>> origin/dev
     */
    public function withValue(bool $withValue = true): static
    {
        $this->withValue = $withValue;
<<<<<<< HEAD
=======

>>>>>>> origin/dev
        return $this;
    }

    /**
     * Get the tags as an array.
<<<<<<< HEAD
     *
     * @return array
=======
>>>>>>> origin/dev
     */
    public function getTags(): array
    {
        $tags = $this->getState();

        if (is_array($tags)) {
            return $this->formatArrayTags($tags);
        }

        $separator = $this->getSeparator();

        if (empty($separator)) {
            return [];
        }

        Assert::string($tags, 'Expected tags to be a string.');

        $tagsArray = explode($separator, $tags);

        return $this->filterEmptyTags($tagsArray);
    }

    /**
     * Format tags when they are in array format.
<<<<<<< HEAD
     *
     * @param array $tags
     * @return array
=======
>>>>>>> origin/dev
     */
    protected function formatArrayTags(array $tags): array
    {
        return collect($tags)
            ->when($this->withValue, fn ($collection) => $collection->reject(fn ($value) => empty($value['value'])))
<<<<<<< HEAD
            ->map(fn ($value, $key) => ($this->withValue ? ($value['name'] ?? $key) . '=' . $value['value'] : $key . '=' . $value))
=======
            ->map(fn ($value, $key) => ($this->withValue ? ($value['name'] ?? $key).'='.$value['value'] : $key.'='.$value))
>>>>>>> origin/dev
            ->toArray();
    }

    /**
     * Filter out empty tags from the array.
<<<<<<< HEAD
     *
     * @param array $tags
     * @return array
=======
>>>>>>> origin/dev
     */
    protected function filterEmptyTags(array $tags): array
    {
        if (count($tags) === 1 && blank($tags[0])) {
            return [];
        }

        return $tags;
    }
}
