<?php

declare(strict_types=1);

namespace App\Resources\Status;

use App\Models\StatusModel;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * @mixin StatusModel
 */
final class IndexResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
