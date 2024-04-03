<?php

declare(strict_types=1);

namespace Main\Domain\Status\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Main\Support\Models\StatusModel;

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
