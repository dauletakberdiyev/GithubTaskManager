<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\TaskModel;
use App\Requests\CreateRequest;
use App\Requests\IndexRequest;
use App\Requests\UpdateRequest;
use App\Resources\IndexResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

final class TaskController extends Controller
{
    public function index(IndexRequest $request): JsonResponse
    {
        $indexDto = $request->getDTO();

        $task = TaskModel::query()
            ->with('statusModel');

        if(!is_null($indexDto->sortingBy)) {
            $task->orderBy($indexDto->sortingBy);
        }

        return $this->response(
            self::translate('task.index'),
            IndexResource::collection($task->get())
        );
    }

    public function create(CreateRequest $request): JsonResponse
    {
        $createDto = $request->getDTO();

        DB::transaction(function () use($createDto): void {
            $task = new TaskModel();
            $task->title = $createDto->title;
            $task->description = $createDto->description;
            $task->status = 1;
            $task->save();
        });

        return $this->response(
            self::translate('task.create'),
            ''
        );
    }

    public function update(TaskModel $task, UpdateRequest $request): JsonResponse
    {
        $updateDto = $request->getDTO();

        DB::transaction(function () use ($task, $updateDto): void {
            $task->title = $updateDto->title;
            $task->description = $updateDto->description;
            $task->status = $updateDto->status;
            $task->save();
        });

        return $this->response(
            self::translate('task.update'),
            ''
        );
    }

    public function delete(TaskModel $task): JsonResponse
    {
        $task->delete();

        return $this->response(
            self::translate('task.delete'),
            ''
        );
    }
}
