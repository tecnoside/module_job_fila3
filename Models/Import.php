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
 * @method static \Modules\Job\Database\Factories\ImportFactory factory($count = null, $state = [])
 * @method static Builder|Import newModelQuery()
 * @method static Builder|Import newQuery()
 * @method static Builder|Import query()
 * @mixin \Eloquent
 */
class Import extends BaseModel
{
    protected $fillable = [
        'id',
        'completed_at',
        'file_name',
        'file_path',
        'importer',
        'processed_rows',
        'total_rows',
        'successful_rows',
        'user_id',
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