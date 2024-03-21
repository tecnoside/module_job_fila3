<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

use function Safe\json_decode;

use Webmozart\Assert\Assert;

/**
 * 
 *
 * @method static \Modules\Job\Database\Factories\FailedImportRowFactory factory($count = null, $state = [])
 * @method static Builder|FailedImportRow newModelQuery()
 * @method static Builder|FailedImportRow newQuery()
 * @method static Builder|FailedImportRow query()
 * @mixin \Eloquent
 */
class FailedImportRow extends BaseModel
{
    protected $fillable = [
        'id',
        'data',
        'import_id',
        'validation_error',
    ];

    protected $casts = [
        'data' => 'json',
        'updated_by' => 'string',
        'created_by' => 'string',
        'deleted_by' => 'string',

        'payload' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'completed_at' => 'datetime',
        // 'updated_at' => 'datetime:Y-m-d H:00',
        // 'created_at' => 'datetime:Y-m-d',
        // 'created_at' => 'datetime:d/m/Y H:i'
    ];
}