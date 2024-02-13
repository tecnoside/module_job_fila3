<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModel.
 */
abstract class BaseModel extends Model
{
    use HasFactory;

    // use Searchable;
    // //use Cachable;
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

    protected string $connection = 'mysql'; // this will use the specified database connection

    /**
     * @var array<string>
     */
    protected array $fillable = ['id'];

    /**
     * @var array<string, string>
     */
    protected array $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected string $primaryKey = 'id';

    /**
     * @var array<int, string>
     */
    protected array $hidden = [
        // 'password'
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return FactoryService::newFactory(static::class);
    }
}
