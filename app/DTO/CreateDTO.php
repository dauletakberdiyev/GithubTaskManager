<?php

namespace App\DTO;

final class CreateDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description
    ) {
    }
}
