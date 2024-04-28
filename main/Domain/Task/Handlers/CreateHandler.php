<?php

declare(strict_types=1);

namespace Main\Domain\Task\Handlers;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Main\Domain\Task\DTO\CreateDTO;
use Main\Support\Exceptions\DomainException;
use Main\Support\Models\TaskModel;
use Main\Support\Traits\LanguageTrait;

final readonly class CreateHandler
{
    use LanguageTrait;

    /**
     * @throws DomainException
     */
    public function handle(CreateDTO $dto): void
    {
        try {
            DB::beginTransaction();

            $task = new TaskModel();
            $task->title = $dto->title;
            $task->description = $dto->description;
            $task->status = TaskModel::OPEN_STATUS;
            $task->save();

            DB::commit();
        } catch (QueryException $error) {
            DB::rollBack();

            throw new DomainException(
                self::translate('task.errors.query_error', [
                    'message' => $error->getMessage(),
                ])
            );
        } catch (Exception $error) {
            DB::rollBack();

            throw new DomainException(
                self::translate('task.errors.error', [
                    'message' => $error->getMessage(),
                ])
            );
        }
    }
}
