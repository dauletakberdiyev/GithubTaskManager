<?php

declare(strict_types=1);

namespace Main\Domain\Task\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;
use Main\Domain\Task\DTO\UpdateDTO;
use Main\Support\Models\StatusModel;

final class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'status' => ['nullable', 'integer', new Exists(StatusModel::class, 'id')],
        ];
    }

    public function getDTO(): UpdateDTO
    {
        return new UpdateDTO(
            $this->validated('title'),
            $this->validated('description'),
            (int) $this->validated('status'),
        );
    }
}
