<?php

namespace App\DTO;

final class UpdateDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly int $status
    ) {
    }
}
