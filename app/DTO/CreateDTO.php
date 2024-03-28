<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class CreateDTO
{
    public function __construct(
        public string $title,
        public string $description
    ) {
    }
}
