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
