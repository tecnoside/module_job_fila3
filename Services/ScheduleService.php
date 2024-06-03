<?php

declare(strict_types=1);

namespace Modules\Job\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Modules\Job\Models\Schedule;
use Webmozart\Assert\Assert;

class ScheduleService
{
    /**
     * Undocumented variable.
     *
     * @var Schedule
     */
    private $model;

    public function __construct()
    {
        Assert::string($modelClass = config('job::model'), '['.__LINE__.']['.__FILE__.']');
        $this->model = app($modelClass);
    }

    /**
     * Undocumented function.
     *
     * @return Collection
     */
    public function getActives()
    {
        if (config('job::cache.enabled')) {
            return $this->getFromCache();
        }

        return $this->model->active()->get();
    }

    public function clearCache(): void
    {
        Assert::string($store = config('job::cache.store'), '['.__LINE__.']['.__FILE__.']');
        Assert::string($key = config('job::cache.key'), '['.__LINE__.']['.__FILE__.']');

        Cache::store($store)->forget($key);
    }

    /**
     * Undocumented function.
     *
     * @return Collection
     */
    private function getFromCache()
    {
        Assert::string($store = config('job::cache.store'), '['.__LINE__.']['.__FILE__.']');
        Assert::string($key = config('job::cache.key'), '['.__LINE__.']['.__FILE__.']');

        return Cache::store($store)->rememberForever($key, function () {
            return $this->model->active()->get();
        });
    }
}
