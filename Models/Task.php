<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Carbon\Carbon;
use Cron\CronExpression;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Modules\Job\Models\Traits\FrontendSortable;

/**
 * Modules\Job\Models\Task.
 *
 * @property int                                                                                                           $id
 * @property string                                                                                                        $description
 * @property string                                                                                                        $command
 * @property string|null                                                                                                   $parameters
 * @property string|null                                                                                                   $expression
 * @property string                                                                                                        $timezone
 * @property int                                                                                                           $is_active
 * @property int                                                                                                           $dont_overlap
 * @property int                                                                                                           $run_in_maintenance
 * @property string|null                                                                                                   $notification_email_address
 * @property string|null                                                                                                   $notification_phone_number
 * @property string                                                                                                        $notification_slack_webhook
 * @property int                                                                                                           $auto_cleanup_num
 * @property string|null                                                                                                   $auto_cleanup_type
 * @property int                                                                                                           $run_on_one_server
 * @property int                                                                                                           $run_in_background
 * @property string|null                                                                                                   $created_by
 * @property string|null                                                                                                   $updated_by
 * @property \Illuminate\Support\Carbon|null                                                                               $created_at
 * @property \Illuminate\Support\Carbon|null                                                                               $updated_at
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Job\Models\Frequency>                                  $frequencies
 * @property int|null                                                                                                      $frequencies_count
 * @property bool                                                                                                          $activated
 * @property float                                                                                                         $average_runtime
 * @property \Modules\Job\Models\Result|null                                                                               $last_result
 * @property string                                                                                                        $upcoming
 * @property \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property int|null                                                                                                      $notifications_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Job\Models\Result>                                     $results
 * @property int|null                                                                                                      $results_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task sortableBy(array $sortableColumns, array $defaultSort = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereAutoCleanupNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereAutoCleanupType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCommand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDontOverlap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereExpression($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereNotificationEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereNotificationPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereNotificationSlackWebhook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereParameters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereRunInBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereRunInMaintenance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereRunOnOneServer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedBy($value)
 *
 * @mixin IdeHelperTask
 * @mixin \Eloquent
 */
class Task extends BaseModel
{
    use Notifiable;
    // use HasFrequencies;
    use FrontendSortable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'description',
        'command',
        'parameters',
        'expression',
        'timezone',
        'is_active',
        'dont_overlap',
        'run_in_maintenance',
        'notification_email_address',
        'notification_phone_number',
        'notification_slack_webhook',
        'auto_cleanup_type',
        'auto_cleanup_num',
        'run_on_one_server',
        'run_in_background',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'activated',
        'upcoming',
        'last_result',
        'average_runtime',
    ];

    /**
     * Activated Accessor.
     */
    public function getActivatedAttribute(): bool
    {
        return (bool) $this->is_active;
    }

    /**
     * Upcoming Accessor.
     *
     * @throws Exception
     */
    public function getUpcomingAttribute(): string
    {
        // return CronExpression::factory($this->getCronExpression())->getNextRunDate()->format('Y-m-d H:i:s');
        return 'preso';
    }

    /**
     * Frequencies Relation.
     */
    public function frequencies(): HasMany
    {
        return $this->hasMany(Frequency::class, 'task_id', 'id')->with('parameters');
    }

    /**
     * Results Relation.
     */
    public function results(): HasMany
    {
        return $this->hasMany(Result::class, 'task_id', 'id');
    }

    /**
     * Returns the most recent result entry for this task.
     */
    public function getLastResultAttribute(): ?Result
    {
        return $this->results()->orderBy('id', 'desc')->first();
    }

    public function getAverageRuntimeAttribute(): float
    {
        /**
         * @var float $avg_duration
         */
        $avg_duration = $this->results()->avg('duration');

        return floatval($avg_duration);
    }

    /**
     * Route notifications for the mail channel.
     */
    public function routeNotificationForMail(): ?string
    {
        return $this->notification_email_address;
    }

    /**
     * Route notifications for the Nexmo channel.
     */
    public function routeNotificationForNexmo(): ?string
    {
        return $this->notification_phone_number;
    }

    /**
     * Route notifications for the Slack channel.
     */
    public function routeNotificationForSlack(): ?string
    {
        return $this->notification_slack_webhook;
    }

    /**
     * Attempt to perform clean on task results.
     */
    public function autoCleanup(): void
    {
        if ($this->auto_cleanup_num > 0) {
            if ('results' === $this->auto_cleanup_type) {
                $oldest_id = $this->results()
                    ->orderBy('ran_at', 'desc')
                    ->limit($this->auto_cleanup_num)
                    ->get()
                    ->min('id');
                do {
                    $rowsToDelete = $this->results()
                        ->where('id', '<', $oldest_id)
                        ->limit(50)
                        ->getQuery()
                        ->select('id')
                        ->pluck('id');

                    Result::query()
                        ->whereIn('id', $rowsToDelete)
                        ->delete();
                } while ($rowsToDelete->count() > 0);
            } else {
                do {
                    $rowsToDelete = $this->results()
                        ->where('ran_at', '<', Carbon::now()->subDays($this->auto_cleanup_num - 1))
                        ->limit(50)
                        ->getQuery()
                        ->select('id')
                        ->pluck('id');

                    Result::query()
                        ->whereIn('id', $rowsToDelete)
                        ->delete();
                } while ($rowsToDelete->count() > 0);
            }
        }
    }

    // /**
    //  * Create a new factory instance for the model.
    //  *
    //  * @return TotemTaskFactory
    //  */
    // protected static function newFactory(): TotemTaskFactory
    // {
    //     return TotemTaskFactory::new();
    // }
}
