<?php

declare(strict_types=1);

namespace Main\Domain\Task\DTO;

final readonly class CreateDTO
{
    public function __construct(
        public string $title,
        public string $description
    ) {
    }
}
