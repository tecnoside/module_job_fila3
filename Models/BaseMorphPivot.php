<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseMorphPivot.
 */
abstract class BaseMorphPivot extends MorphPivot
{
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see https://laravel-news.com/6-eloquent-secrets
     */
    public static bool $snakeAttributes = true;

    public bool $incrementing = true;

    public bool $timestamps = true;

    protected $perPage = 30;

    protected $connection = 'mysql'; // this will use the specified database connection

    /**
     * @var array
     */
    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected array $appends = [];

    protected string $primaryKey = 'id';

    /**
     * @var array<string>
     */
    protected array $fillable = [
        'id',
        'post_id', 'post_type',
        'related_type',
        'user_id',
        'note',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}
