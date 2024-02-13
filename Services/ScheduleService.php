<?php


namespace Modules\Job\Services;

use Webmozart\Assert\Assert;
use Modules\Job\Models\Schedule;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ScheduleService
{
    /**
     * Undocumented variable
     *
     * @var Schedule
     */
    private $model;

    public function __construct()
    {
        Assert::string($modelClass=config('job::model'));
        $this->model = app($modelClass);
    }

    /**
     * Undocumented function
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

    public function clearCache():void
    {
        Assert::string($store = config('job::cache.store'));
        Assert::string($key = config('job::cache.key'));

        Cache::store($store)->forget($key);
    }

    /**
     * Undocumented function
     *
     * @return Collection
     */
    private function getFromCache()
    {
        Assert::string($store = config('job::cache.store'));
        Assert::string($key = config('job::cache.key'));

        return Cache::store($store)->rememberForever($key, function () {
            return $this->model->active()->get();
        });
    }
}
