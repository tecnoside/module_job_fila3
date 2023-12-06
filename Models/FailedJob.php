<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Modules\Job\Database\Factories\FailedJobFactory;
use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Job\Models\FailedJob
 *
 * @method static \Modules\Job\Database\Factories\FailedJobFactory factory($count = null, $state = [])
 * @method static Builder|FailedJob newModelQuery()
 * @method static Builder|FailedJob newQuery()
 * @method static Builder|FailedJob query()
 * @property int $id
 * @property string $uuid
 * @property string $connection
 * @property string $queue
 * @property array $payload
 * @property string $exception
 * @property string $failed_at
 * @method static Builder|FailedJob whereConnection($value)
 * @method static Builder|FailedJob whereException($value)
 * @method static Builder|FailedJob whereFailedAt($value)
 * @method static Builder|FailedJob whereId($value)
 * @method static Builder|FailedJob wherePayload($value)
 * @method static Builder|FailedJob whereQueue($value)
 * @method static Builder|FailedJob whereUuid($value)
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

    protected $casts = [
        'payload' => 'array',
    ];
}
