<?php

declare(strict_types=1);

namespace Main\Domain\Task\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Main\Support\Models\TaskModel;


/**
 *
 * @mixin TaskModel
 */
final class IndexResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->statusModel?->title,
            'created' => $this->created_at->toString(),
            'updated' => $this->updated_at->toString()
        ];
    }
}
