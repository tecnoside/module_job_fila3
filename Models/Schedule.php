<?php

namespace Modules\Job\Models;

use Modules\Job\Enums\Status;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Console\Scheduling\ManagesFrequencies;

/**
 * Modules\Job\Models\Result
 * @property Status $status
 * @property array $options
 * */
class Schedule extends BaseModel
{
    use ManagesFrequencies;
    use SoftDeletes;

    /*
     * The database table used by the model.
     *
     * @var string
     */
    //protected $table;

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

    protected $casts = [
        'params' => 'array',
        'options' => 'array',
        'options_with_value' => 'array',
        'environments' => 'array',
        'status' => Status::class,
    ];

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

    public function histories():HasMany
    {
        return $this->hasMany(ScheduleHistory::class, 'schedule_id', 'id');
    }

    public function scopeInactive(Builder $query):Builder
    {
        return $query->where('status', Status::Inactive);
    }

    public function scopeActive(Builder $query):Builder
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
            if (isset($value["type"]) && $value['type'] === 'function') {
                eval('$arguments[$argument] = (string) ' . $value['value']);
            } else {
                $arguments[$value['name']??$argument] = $value['value'];
            }
        }

        return $arguments;
    }

    public function getOptions(): array
    {
        $options = collect($this->options ?? []);

        $options_with_value = $this->options_with_value ?? [];
        if (!empty($options_with_value))
        $options = $options->merge($options_with_value);
        return $options->map(function ($value, $key) {

                if (is_array($value)) {
                    return "--" . ($value['name']??$key) . "=" . $value['value'];
                } else {
                    return "--$value";
                }

        })->toArray();
    }

    /**
     * Undocumented function
     *
     * @return Collection
     */
    public static function getEnvironments()
    {
        return static::whereNotNull('environments')
            ->groupBy('environments')
            ->get('environments')
            ->pluck('environments', 'environments');
    }
}
