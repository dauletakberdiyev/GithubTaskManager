<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\StatusModel;
use App\Resources\Status\IndexResource;
use Illuminate\Http\JsonResponse;

final class StatusController extends Controller
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
