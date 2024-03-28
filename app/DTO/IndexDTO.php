<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class IndexDTO
{
    public function __construct(
        public ?string $sortingBy,
    ) {
    }
}
