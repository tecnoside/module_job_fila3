<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * 
 *
 * @method static \Modules\Job\Database\Factories\FailedImportRowFactory factory($count = null, $state = [])
 * @method static Builder|FailedImportRow                                newModelQuery()
 * @method static Builder|FailedImportRow                                newQuery()
 * @method static Builder|FailedImportRow                                query()
 * @property int                             $id
 * @property array                           $data
 * @property int                             $import_id
 * @property string|null                     $validation_error
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $updated_by
 * @property string|null                     $created_by
 * @method static Builder|FailedImportRow whereCreatedAt($value)
 * @method static Builder|FailedImportRow whereCreatedBy($value)
 * @method static Builder|FailedImportRow whereData($value)
 * @method static Builder|FailedImportRow whereId($value)
 * @method static Builder|FailedImportRow whereImportId($value)
 * @method static Builder|FailedImportRow whereUpdatedAt($value)
 * @method static Builder|FailedImportRow whereUpdatedBy($value)
 * @method static Builder|FailedImportRow whereValidationError($value)
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

    protected function casts(): array
    {
        return [
            'data' => 'json',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',

            'payload' => 'array',
            'completed_at' => 'datetime',
            // 'updated_at' => 'datetime:Y-m-d H:00',
            // 'created_at' => 'datetime:Y-m-d',
            // 'created_at' => 'datetime:d/m/Y H:i'
        ];
    }
}