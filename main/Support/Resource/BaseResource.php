<?php

declare(strict_types=1);

namespace Main\Support\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseResource extends JsonResource
{
    abstract public function getResponseArray(): array;

    public function toArray($request): array
    {
        return $this->getResponseArray();
    }
}
