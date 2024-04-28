<?php

declare(strict_types=1);

namespace Main\Domain\Task\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\JsonResponse;
use Main\Domain\Task\Handlers\CreateHandler;
use Main\Domain\Task\Handlers\IndexHandler;
use Main\Domain\Task\Handlers\UpdateHandler;
use Main\Domain\Task\Requests\CreateRequest;
use Main\Domain\Task\Requests\IndexRequest;
use Main\Domain\Task\Requests\UpdateRequest;
use Main\Domain\Task\Resources\IndexResource;
use Main\Support\Exceptions\DomainException;
use Main\Support\Models\TaskModel;

final class Controller extends BaseController
{
    public function index(IndexRequest $request, IndexHandler $handler): JsonResponse
    {
        return $this->response(
            self::translate('task.index'),
            IndexResource::collection($handler->handle($request->getDTO()))
        );
    }

    /**
     * @throws DomainException
     */
    public function create(CreateRequest $request, CreateHandler $handler): JsonResponse
    {
        $handler->handle($request->getDTO());

        return $this->response(self::translate('task.create'));
    }

    /**
     * @throws DomainException
     */
    public function update(TaskModel $task, UpdateRequest $request, UpdateHandler $handler): JsonResponse
    {
        $handler->handle($request->getDTO(), $task);

        return $this->response(self::translate('task.update'));
    }

    public function delete(TaskModel $task): JsonResponse
    {
        $task->delete();

        return $this->response(self::translate('task.delete'));
    }
}
