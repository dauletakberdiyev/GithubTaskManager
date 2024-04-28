<?php

declare(strict_types=1);

namespace Main\Domain\Task\Handlers;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Main\Domain\Task\DTO\UpdateDTO;
use Main\Support\Exceptions\DomainException;
use Main\Support\Models\TaskModel;
use Main\Support\Traits\LanguageTrait;

final readonly class UpdateHandler
{
    use LanguageTrait;

    /**
     * @throws DomainException
     */
    public function handle(UpdateDTO $dto, TaskModel $task): void
    {
        try {
            DB::beginTransaction();

            if ($dto->title) {
                $task->title = $dto->title;
            }
            if ($dto->description) {
                $task->description = $dto->description;
            }
            if ($dto->status) {
                $task->status = $dto->status;
            }
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
