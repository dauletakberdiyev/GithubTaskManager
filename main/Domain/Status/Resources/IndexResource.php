<?php

declare(strict_types=1);

namespace Main\Domain\Status\Resources;

use Main\Support\Models\StatusModel;
use Main\Support\Resource\BaseResource;

/**
 * @mixin StatusModel
 */
final class IndexResource extends BaseResource
{
    public function getResponseArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
