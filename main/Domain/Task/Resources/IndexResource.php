<?php

declare(strict_types=1);

namespace Main\Domain\Task\Resources;

use Main\Support\Models\TaskModel;
use Main\Support\Resource\BaseResource;

/**
 * @mixin TaskModel
 */
final class IndexResource extends BaseResource
{
    public function getResponseArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => new StatusResource($this->statusModel),
            'created' => $this->created_at->toDateTimeString(),
            'updated' => $this->updated_at->toDateTimeString()
        ];
    }
}
