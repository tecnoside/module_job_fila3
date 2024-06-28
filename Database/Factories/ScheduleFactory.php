<?php

declare(strict_types=1);

namespace Modules\Job\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\Job\Models\Schedule;

class ScheduleFactory extends Factory
{
=======
use Illuminate\Support\Str;

use Modules\Job\Models\Schedule;

class ScheduleFactory extends Factory {
>>>>>>> 21140ac (first)
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
<<<<<<< HEAD
    public function definition()
    {
        return [
=======
    public function definition() {


        return [
            
>>>>>>> 21140ac (first)
        ];
    }
}
