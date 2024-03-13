<?php

declare(strict_types=1);

/**
 * @see HusamTariq\FilamentDatabaseSchedule
 */

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modules\Job\Models\ScheduleHistory.
 *
 * @property \Modules\Job\Models\Schedule|null $command
 *
 * @method static \Modules\Job\Database\Factories\ScheduleHistoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ScheduleHistory  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScheduleHistory  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScheduleHistory  query()
 *
 * @mixin \Eloquent
 */
class ScheduleHistory extends BaseModel
{
    /*
     * The database table used by the model.
     *
     * @var string
     */
    // protected $table;

    protected $fillable = [
        'command',
        'params',
        'output',
        'options',
    ];
    protected $casts = [
        'updated_by' => 'string',
        'created_by' => 'string',
        'deleted_by' => 'string',

        'params' => 'array',
        'options' => 'array',
    ];
    /*
         * Creates a new instance of the model.
         *
         * @param array $attributes
         * @return void
         */
    /*
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = Config::get('filament-database-schedule.table.schedule_histories', 'schedule_histories');
    }

    */

    public function command(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }
}
