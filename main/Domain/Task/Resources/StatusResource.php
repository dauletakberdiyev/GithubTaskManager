<?php

declare(strict_types=1);

namespace Main\Domain\Task\Resources;

use Main\Support\Models\StatusModel;
use Main\Support\Resource\BaseResource;

/**
 * @mixin StatusModel
 */
final class StatusResource extends BaseResource
{
    public function getResponseArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
