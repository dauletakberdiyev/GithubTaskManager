<?php

declare(strict_types=1);

namespace Main\Domain\Status\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\JsonResponse;
use Main\Domain\Status\Resources\IndexResource;
use Main\Support\Models\StatusModel;

final class Controller extends BaseController
{
    public function index(): JsonResponse
    {
        $statuses = StatusModel::query()->get();

        return $this->response(
            self::translate('status.index'),
            IndexResource::collection($statuses)
        );
    }
}
