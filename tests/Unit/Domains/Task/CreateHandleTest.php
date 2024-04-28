<?php

declare(strict_types=1);

namespace Unit\Domains\Task;

use Main\Domain\Task\DTO\CreateDTO;
use Main\Domain\Task\Handlers\CreateHandler;
use Main\Support\Exceptions\DomainException;
use Tests\TestCase;

final class CreateHandleTest extends TestCase
{
    private readonly CreateHandler $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = $this->app->make(CreateHandler::class);
    }

    /**
     * @throws DomainException
     */
    public function testSuccessCase(): void
    {
        $dto = new CreateDto(
            $this->faker->sentence,
            $this->faker->text
        );

        $this->handler->handle($dto);

        $this->assertDatabaseHas('task', ['title' => $dto->title]);
    }
}
