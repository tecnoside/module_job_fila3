<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Console\Scheduling\ManagesFrequencies;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Modules\Job\Enums\Status;

/**
 * Modules\Job\Models\Result.
 *
 * @property Status $status
 * @property array $options
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Job\Models\ScheduleHistory> $histories
 * @property int|null $histories_count
 * @method static Builder|Schedule active()
 * @method static \Modules\Job\Database\Factories\ScheduleFactory factory($count = null, $state = [])
 * @method static Builder|Schedule inactive()
 * @method static Builder|Schedule newModelQuery()
 * @method static Builder|Schedule newQuery()
 * @method static Builder|Schedule onlyTrashed()
 * @method static Builder|Schedule query()
 * @method static Builder|Schedule withTrashed()
 * @method static Builder|Schedule withoutTrashed()
 * @property int $id
 * @property string $command
 * @property string|null $command_custom
 * @property array|null $params
 * @property string $expression
 * @property array|null $environments
 * @property array|null $options_with_value
 * @property string|null $log_filename
 * @property int $even_in_maintenance_mode
 * @property int $without_overlapping
 * @property int $on_one_server
 * @property string|null $webhook_before
 * @property string|null $webhook_after
 * @property string|null $email_output
 * @property int $sendmail_error
 * @property int $log_success
 * @property int $log_error
 * @property int $run_in_background
 * @property int $sendmail_success
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @method static Builder|Schedule whereCommand($value)
 * @method static Builder|Schedule whereCommandCustom($value)
 * @method static Builder|Schedule whereCreatedAt($value)
 * @method static Builder|Schedule whereCreatedBy($value)
 * @method static Builder|Schedule whereDeletedAt($value)
 * @method static Builder|Schedule whereDeletedBy($value)
 * @method static Builder|Schedule whereEmailOutput($value)
 * @method static Builder|Schedule whereEnvironments($value)
 * @method static Builder|Schedule whereEvenInMaintenanceMode($value)
 * @method static Builder|Schedule whereExpression($value)
 * @method static Builder|Schedule whereId($value)
 * @method static Builder|Schedule whereLogError($value)
 * @method static Builder|Schedule whereLogFilename($value)
 * @method static Builder|Schedule whereLogSuccess($value)
 * @method static Builder|Schedule whereOnOneServer($value)
 * @method static Builder|Schedule whereOptions($value)
 * @method static Builder|Schedule whereOptionsWithValue($value)
 * @method static Builder|Schedule whereParams($value)
 * @method static Builder|Schedule whereRunInBackground($value)
 * @method static Builder|Schedule whereSendmailError($value)
 * @method static Builder|Schedule whereSendmailSuccess($value)
 * @method static Builder|Schedule whereStatus($value)
 * @method static Builder|Schedule whereUpdatedAt($value)
 * @method static Builder|Schedule whereUpdatedBy($value)
 * @method static Builder|Schedule whereWebhookAfter($value)
 * @method static Builder|Schedule whereWebhookBefore($value)
 * @method static Builder|Schedule whereWithoutOverlapping($value)
 * @property-read \Modules\Fixcity\Models\Profile|null $creator
 * @property-read \Modules\Fixcity\Models\Profile|null $updater
 * @mixin \Eloquent
 */
class Schedule extends BaseModel
{
    use ManagesFrequencies;
    use SoftDeletes;

    public const STATUS_INACTIVE = 0;

    public const STATUS_ACTIVE = 1;

    public const STATUS_TRASHED = 2;

    protected $fillable = [
        'command',
        'command_custom',
        'params',
        'options',
        'options_with_value',
        'expression',
        'even_in_maintenance_mode',
        'without_overlapping',
        'on_one_server',
        'webhook_before',
        'webhook_after',
        'email_output',
        'sendmail_error',
        'sendmail_success',
        'log_success',
        'log_error',
        'status',
        'run_in_background',
        'log_filename',
        'environments',
    ];

    protected $attributes = [
        'expression' => '* * * * *',
        'params' => '{}',
        'options' => '{}',
        'options_with_value' => '{}',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',

            'params' => 'array',
            'options' => 'array',
            'options_with_value' => 'array',
            'environments' => 'array',
            'status' => Status::class,
        ];
    }
    /*
         * Creates a new instance of the model.
         *
         * @param array $attributes
         * @return void

        public function __construct(array $attributes = [])
        {
            parent::__construct($attributes);

            $this->table = Config::get('filament-database-schedule.table.schedules', 'schedules');
        }
        */

    public function histories(): HasMany
    {
        return $this->hasMany(ScheduleHistory::class, 'schedule_id', 'id');
    }

    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('status', Status::Inactive);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', Status::Active);
    }

    public function getArguments(): array
    {
        $arguments = [];
        foreach (($this->params ?? []) as $argument => $value) {
            if (empty($value['value'])) {
                continue;
            }
            if (isset($value['type']) && $value['type'] === 'function') {
                eval('$arguments[$argument] = (string) '.$value['value']);
            } else {
                $arguments[$value['name'] ?? $argument] = $value['value'];
            }
        }

        return $arguments;
    }

    public function getOptions(): array
    {
        $options = collect($this->options ?? []);
        $options_with_value = $this->options_with_value ?? [];
        if (! empty($options_with_value)) {
            $options = $options->merge($options_with_value);
        }

        return $options->map(static function ($value, $key) {
            if (is_array($value)) {
                return '--'.($value['name'] ?? $key).'='.$value['value'];
            }

            return "--{$value}";
        })->toArray();
    }

    public static function getEnvironments(): Collection
    {
        return static::whereNotNull('environments')
            ->groupBy('environments')
            ->get('environments')
            ->pluck('environments', 'environments');
    }
}
