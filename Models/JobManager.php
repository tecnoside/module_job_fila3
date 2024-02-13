<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Contracts\Queue\Job as JobContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;

/**
 * Modules\Job\Models\JobManager.
 *
 * @property string          $id
 * @property string          $name
 * @property bool            $failed
 * @property int             $total_jobs
 * @property int             $pending_jobs
 * @property int             $failed_jobs
 * @property string          $failed_job_ids
 * @property Collection|null $options
 * @property Carbon|null     $cancelled_at
 * @property Carbon          $created_at
 * @property Carbon|null     $finished_at
 *
 * @method static \Modules\Job\Database\Factories\JobManagerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|JobManager  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobManager  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobManager  query()
 *
 * @mixin \Eloquent
 */
class JobManager extends BaseModel
{
    // use HasFactory, Prunable;

    // protected $table = 'job_manager';

    protected $fillable = [
        'job_id',
        'name',
        'queue',
        'started_at',
        'finished_at',
        'failed',
        'attempt',
        'progress',
        'exception_message',
    ];

    protected $casts = [
        'failed' => 'bool',
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];

    public function status(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->isFinished()) {
                    return $this->failed ? 'failed' : 'succeeded';
                }

                return 'running';
            },
        );
    }

    public static function getJobId(JobContract $job): string|int
    {
        if ($jobId = $job->getJobId()) {
            return $jobId;
        }

        return Hash::make($job->getRawBody());
    }

    public function isFinished(): bool
    {
        if ($this->hasFailed()) {
            return true;
        }

        return $this->finished_at !== null;
    }

    public function hasFailed(): bool
    {
        return $this->failed;
    }

    public function hasSucceeded(): bool
    {
        if (! $this->isFinished()) {
            return false;
        }

        return ! $this->hasFailed();
    }

    public function prunable(): \Illuminate\Database\Eloquent\Builder
    {
        if (config('jobs.pruning.activate')) {
            $retention_days = config('jobs.pruning.retention_days');
            if (! is_integer($retention_days)) {
                $retention_days = 365;
            }

            return static::where('created_at', '<=', now()->subDays($retention_days));
        }

        return static::query();
    }
}
