<?php

declare(strict_types=1);

namespace Main\Domain\Task\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Main\Domain\Task\DTO\UpdateDTO;

final class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'status' => ['required', 'integer'],
        ];
    }

    public function getDTO(): UpdateDTO
    {
        return new UpdateDTO(
            $this->validated('title'),
            $this->validated('description'),
            $this->validated('status'),
        );
    }
}
