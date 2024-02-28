<?php

namespace App\DTO;

final class IndexDTO
{
    public function __construct(
        public readonly ?string $sortingBy,
    ) {
    }
}
