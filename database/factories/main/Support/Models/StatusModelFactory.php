<?php

declare(strict_types=1);

namespace Database\Factories\main\Support\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Main\Support\Models\StatusModel;

/**
 * @extends Factory<StatusModel>
 */
final class StatusModelFactory extends Factory
{
    protected $model = StatusModel::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
        ];
    }
}
