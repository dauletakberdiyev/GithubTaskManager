<?php

declare(strict_types=1);

namespace App\Resources;

use App\Models\TaskModel;
use Illuminate\Http\Resources\Json\JsonResource;

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
