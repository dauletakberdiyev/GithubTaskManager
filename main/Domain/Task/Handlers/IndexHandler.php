<?php

declare(strict_types=1);

namespace Main\Domain\Task\Handlers;

use Illuminate\Database\Eloquent\Collection;
use Main\Domain\Task\DTO\IndexDTO;
use Main\Support\Models\TaskModel;

final readonly class IndexHandler
{
    public function handle(IndexDTO $dto): Collection
    {
        return TaskModel::query()->with('statusModel')
            ->when($dto->sortingBy, fn ($query) => $query->orderBy($dto->sortingBy))
            ->get();
    }
}
