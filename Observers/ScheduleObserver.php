<?php
<<<<<<< HEAD

declare(strict_types=1);
=======
>>>>>>> 21140ac (first)
/**
 * @see HusamTariq\FilamentDatabaseSchedule
 */

namespace Modules\Job\Observers;

use Modules\Job\Enums\Status;
<<<<<<< HEAD
use Modules\Job\Models\Schedule;
use Modules\Job\Services\ScheduleService;
=======
use Modules\Job\Services\ScheduleService;
use Modules\Job\Models\Schedule;
>>>>>>> 21140ac (first)

class ScheduleObserver
{
    /**
<<<<<<< HEAD
     * Undocumented function.
=======
     * Undocumented function
>>>>>>> 21140ac (first)
     *
     * @return void
     */
    public function created()
    {
        $this->clearCache();
    }

    /**
<<<<<<< HEAD
     * Undocumented function.
     *
=======
     * Undocumented function
     *
     * @param Schedule $schedule
>>>>>>> 21140ac (first)
     * @return void
     */
    public function updated(Schedule $schedule)
    {
        $this->clearCache();
    }

    /**
<<<<<<< HEAD
     * Undocumented function.
     *
=======
     * Undocumented function
     *
     * @param Schedule $schedule
>>>>>>> 21140ac (first)
     * @return void
     */
    public function deleted(Schedule $schedule)
    {
<<<<<<< HEAD
=======

>>>>>>> 21140ac (first)
        $schedule->status = Status::Trashed;
        $schedule->saveQuietly();
        $this->clearCache();
    }

    /**
<<<<<<< HEAD
     * Undocumented function.
     *
=======
     * Undocumented function
     *
     * @param Schedule $schedule
>>>>>>> 21140ac (first)
     * @return void
     */
    public function restored(Schedule $schedule)
    {
        $schedule->status = Status::Inactive;
        $schedule->saveQuietly();
    }

    /**
<<<<<<< HEAD
     * Undocumented function.
     *
=======
     * Undocumented function
     *
     * @param Schedule $schedule
>>>>>>> 21140ac (first)
     * @return void
     */
    public function saved(Schedule $schedule)
    {
        $this->clearCache();
    }

    /**
<<<<<<< HEAD
     * Undocumented function.
=======
     * Undocumented function
>>>>>>> 21140ac (first)
     *
     * @return void
     */
    protected function clearCache()
    {
        if (config('job::cache.enabled')) {
            $scheduleService = app(ScheduleService::class);
            $scheduleService->clearCache();
        }
    }
}
