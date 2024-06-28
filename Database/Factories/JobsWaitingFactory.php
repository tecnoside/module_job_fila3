<?php

declare(strict_types=1);

namespace Modules\Job\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Job\Models\JobsWaiting;

class JobsWaitingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = JobsWaiting::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
=======
     *
     * @return array
>>>>>>> 21140ac (first)
     */
    public function definition(): array
    {
        return [
            // 'id' => $this->faker->number(1,5),
            'queue' => $this->faker->word,
            'payload' => $this->faker->text,
            'attempts' => $this->faker->boolean,
            // 'reserved_at' => $this->faker->randomNumber,
            // 'available_at' => $this->faker->randomNumber,
            // 'created_at' => $this->faker->randomNumber
        ];
    }
}
