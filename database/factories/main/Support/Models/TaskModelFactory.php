<?php

declare(strict_types=1);

namespace Database\Factories\main\Support\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Main\Support\Models\StatusModel;
use Main\Support\Models\TaskModel;

/**
 * @extends Factory<TaskModel>
 */
final class TaskModelFactory extends Factory
{
    protected $model = TaskModel::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = StatusModel::all()->random();

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'status' => $status->id
        ];
    }
}
