<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Job\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Modules\Job\Models\Schedule;
use Webmozart\Assert\Assert;
=======

namespace Modules\Job\Services;

use Webmozart\Assert\Assert;
use Modules\Job\Models\Schedule;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
>>>>>>> 21140ac (first)

class ScheduleService
{
    /**
<<<<<<< HEAD
     * Undocumented variable.
=======
     * Undocumented variable
>>>>>>> 21140ac (first)
     *
     * @var Schedule
     */
    private $model;

    public function __construct()
    {
<<<<<<< HEAD
        Assert::string($modelClass = config('job::model'), '['.__LINE__.']['.__FILE__.']');
=======
        Assert::string($modelClass=config('job::model'));
>>>>>>> 21140ac (first)
        $this->model = app($modelClass);
    }

    /**
<<<<<<< HEAD
     * Undocumented function.
=======
     * Undocumented function
>>>>>>> 21140ac (first)
     *
     * @return Collection
     */
    public function getActives()
    {
        if (config('job::cache.enabled')) {
            return $this->getFromCache();
        }
<<<<<<< HEAD

        return $this->model->active()->get();
    }

    public function clearCache(): void
    {
        Assert::string($store = config('job::cache.store'), '['.__LINE__.']['.__FILE__.']');
        Assert::string($key = config('job::cache.key'), '['.__LINE__.']['.__FILE__.']');
=======
        return $this->model->active()->get();
    }

    public function clearCache():void
    {
        Assert::string($store = config('job::cache.store'));
        Assert::string($key = config('job::cache.key'));
>>>>>>> 21140ac (first)

        Cache::store($store)->forget($key);
    }

    /**
<<<<<<< HEAD
     * Undocumented function.
=======
     * Undocumented function
>>>>>>> 21140ac (first)
     *
     * @return Collection
     */
    private function getFromCache()
    {
<<<<<<< HEAD
        Assert::string($store = config('job::cache.store'), '['.__LINE__.']['.__FILE__.']');
        Assert::string($key = config('job::cache.key'), '['.__LINE__.']['.__FILE__.']');
=======
        Assert::string($store = config('job::cache.store'));
        Assert::string($key = config('job::cache.key'));
>>>>>>> 21140ac (first)

        return Cache::store($store)->rememberForever($key, function () {
            return $this->model->active()->get();
        });
    }
}
