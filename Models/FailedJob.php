<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Job\Models\FailedJob.
 *
 * @method static \Modules\Job\Database\Factories\FailedJobFactory factory($count = null, $state = [])
 * @method static Builder|FailedJob                                newModelQuery()
 * @method static Builder|FailedJob                                newQuery()
 * @method static Builder|FailedJob                                query()
<<<<<<< HEAD
 *
=======
>>>>>>> 21140ac (first)
 * @property int    $id
 * @property string $uuid
 * @property string $connection
 * @property string $queue
 * @property array  $payload
 * @property string $exception
 * @property string $failed_at
<<<<<<< HEAD
 *
=======
>>>>>>> 21140ac (first)
 * @method static Builder|FailedJob whereConnection($value)
 * @method static Builder|FailedJob whereException($value)
 * @method static Builder|FailedJob whereFailedAt($value)
 * @method static Builder|FailedJob whereId($value)
 * @method static Builder|FailedJob wherePayload($value)
 * @method static Builder|FailedJob whereQueue($value)
 * @method static Builder|FailedJob whereUuid($value)
<<<<<<< HEAD
 *
=======
>>>>>>> 21140ac (first)
 * @mixin \Eloquent
 */
class FailedJob extends BaseModel
{
    protected $fillable = [
        'id',
        'uuid',
        'connection',
        'queue',
        'payload',
        'exception',
        'failed_at',
    ];

<<<<<<< HEAD
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',

            'payload' => 'array',
        ];
    }
=======
    protected $casts = [
        'updated_by' => 'string',
        'created_by' => 'string',
        'deleted_by' => 'string',

        'payload' => 'array',
    ];
>>>>>>> 21140ac (first)
}
