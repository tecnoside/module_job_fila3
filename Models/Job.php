<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Webmozart\Assert\Assert;

/**
 * Modules\Job\Models\Job.
 *
 * @method static \Modules\Job\Database\Factories\JobFactory factory($count = null, $state = [])
 * @method static Builder|Job newModelQuery()
 * @method static Builder|Job newQuery()
 * @method static Builder|Job query()
 * @mixin \Eloquent
 */
class Job extends BaseModel
{
    protected $fillable = [
        'id',
        'queue',
        'payload',
        'attempts',
        'reserved_at',
        'available_at',
        'created_at',
    ];

    protected $casts = [
        'payload' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        // 'updated_at' => 'datetime:Y-m-d H:00',
        // 'created_at' => 'datetime:Y-m-d',
        // 'created_at' => 'datetime:d/m/Y H:i'
    ];

    public function getTable(): string
    {
        Assert::string($res = config('queue.connections.database.table'));

        return $res;
    }
}
