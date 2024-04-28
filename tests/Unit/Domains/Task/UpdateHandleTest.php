<?php

declare(strict_types=1);

namespace Unit\Domains\Task;

use Main\Domain\Task\DTO\UpdateDTO;
use Main\Domain\Task\Handlers\UpdateHandler;
use Main\Support\Exceptions\DomainException;
use Main\Support\Models\StatusModel;
use Main\Support\Models\TaskModel;
use Tests\TestCase;

final class UpdateHandleTest extends TestCase
{
    private readonly UpdateHandler $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = $this->app->make(UpdateHandler::class);
    }

    /**
     * @throws DomainException
     */
    public function testSuccessCase(): void
    {
        /** @var StatusModel $status */
        $status = StatusModel::all()->random();

        /** @var TaskModel $task */
        $task = TaskModel::factory()->create();

        $dto = new UpdateDto(
            $this->faker->sentence,
            $this->faker->text,
            $status->id
        );

        $this->handler->handle($dto, $task);

        $this->assertDatabaseHas('task', [
            'id' => $task->id,
            'title' => $dto->title,
            'description' => $dto->description,
            'status' => $dto->status,
        ]);
    }
}
