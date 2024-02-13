<?php
/**
 * @see HusamTariq\FilamentDatabaseSchedule
 */

namespace Modules\Job\Observers;

use Modules\Job\Enums\Status;
use Modules\Job\Services\ScheduleService;
use Modules\Job\Models\Schedule;

class ScheduleObserver
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function created()
    {
        $this->clearCache();
    }

    /**
     * Undocumented function
     *
     * @param Schedule $schedule
     * @return void
     */
    public function updated(Schedule $schedule)
    {
        $this->clearCache();
    }

    /**
     * Undocumented function
     *
     * @param Schedule $schedule
     * @return void
     */
    public function deleted(Schedule $schedule)
    {

        $schedule->status = Status::Trashed;
        $schedule->saveQuietly();
        $this->clearCache();
    }

    /**
     * Undocumented function
     *
     * @param Schedule $schedule
     * @return void
     */
    public function restored(Schedule $schedule)
    {
        $schedule->status = Status::Inactive;
        $schedule->saveQuietly();
    }

    /**
     * Undocumented function
     *
     * @param Schedule $schedule
     * @return void
     */
    public function saved(Schedule $schedule)
    {
        $this->clearCache();
    }

    /**
     * Undocumented function
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
