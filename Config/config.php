<?php

declare(strict_types=1);

use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Job\Models\Schedule;

return [
    'name' => 'Job',
    'icon' => 'heroicon-o-briefcase',
    'navigation_sort' => 1,
<<<<<<< HEAD
    /*
=======
    /**
>>>>>>> 21140ac (first)
     *  Table and Model used for schedule list
     */
    'table' => [
        'schedules' => 'schedules',
        'schedule_histories' => 'schedule_histories',
    ],
    'model' => Schedule::class,

    'timezone' => env('FILAMENT_SCHEDULE_TIMEZONE', config('app.timezone')),

    'resources' => [
        ScheduleResource::class,
    ],

<<<<<<< HEAD
    /*
=======
    /**
>>>>>>> 21140ac (first)
     * Cache settings
     */
    'cache' => [
        'store' => env('FILAMENT_SCHEDULE_CACHE_DRIVER', 'file'),
<<<<<<< HEAD
        // 'key' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_schedule_'),
=======
        //'key' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_schedule_'),
>>>>>>> 21140ac (first)
        'key' => env('REDIS_PREFIX', '_database_schedule_'),
        'enabled' => env('FILAMENT_SCHEDULE_CACHE_ENABLE', ! config('app.debug')),
    ],

<<<<<<< HEAD
    /*
=======
    /**
>>>>>>> 21140ac (first)
     * Route settings
     */
    'route_slug' => 'schedules',

    'default_ordering' => 'created_at',
    'default_ordering_direction' => 'DESC',

<<<<<<< HEAD
    /*
=======
    /**
>>>>>>> 21140ac (first)
     * Resource navigation icon
     */
    'navigation_icon' => 'heroicon-o-rectangle-stack',

<<<<<<< HEAD
    /*
=======
    /**
>>>>>>> 21140ac (first)
     * When opening history, is output collapsed
     */
    'history_collapsed' => env('FILAMENT_SCHEDULE_HISTORY_COLLAPSED', false),

<<<<<<< HEAD
    /*
=======
    /**
>>>>>>> 21140ac (first)
     * How many jobs do you want to have on each page ?
     */
    'per_page' => 10,

<<<<<<< HEAD
    /*
     * Commands settings
     */
    'commands' => [
        'enable_custom' => true,
        /*
         * By default, all commands possible to be used with "php artisan" will be shown, this parameter excludes from
         * the list commands that you do not want to show for the schedule.
         */
        'exclude' => [ // regex
=======
    /**
     * Commands settings
     */
    'commands' => [

        'enable_custom' => true,
        /**
         * By default, all commands possible to be used with "php artisan" will be shown, this parameter excludes from
         * the list commands that you do not want to show for the schedule.
         */
        'exclude' => [ //regex
>>>>>>> 21140ac (first)
            'help',
            'list',
            'test',
            'down',
            'up',
            'env',
            'serve',
            'tinker',
            'clear-compiled',
            'key:generate',
            'package:discover',
            'storage:link',
            'notifications:table',
            'session:table',
            'stub:publish',
            'vendor:publish',
            'route:*',
            'event:*',
            'migrate:*',
            'cache:*',
            'auth:*',
            'config:*',
            'db:*',
            'optimize*',
            'make:*',
            'queue:*',
            'schedule:*',
            'view:*',
            'phpunit:*',
        ],
<<<<<<< HEAD
        /*
=======
        /**
>>>>>>> 21140ac (first)
         * Alternatively, you can set the "show_supported_only" parameter to true to only allow commands
         * that are in the supported list.
         */
        'show_supported_only' => false,
        'supported' => [
<<<<<<< HEAD
            // ex."erp:*"
=======
            //ex."erp:*"
>>>>>>> 21140ac (first)
        ],
    ],

    'tool-help-cron-expression' => [
        'enable' => true,
        'url' => 'https://crontab.cronhub.io/',
    ],
<<<<<<< HEAD
];
=======
];
>>>>>>> 21140ac (first)
