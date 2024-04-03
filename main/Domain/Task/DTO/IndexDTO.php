<?php

declare(strict_types=1);

namespace Main\Domain\Task\DTO;

final readonly class IndexDTO
{
    public function __construct(
        public ?string $sortingBy,
    ) {
    }
}
