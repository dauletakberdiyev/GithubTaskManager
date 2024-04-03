<?php

declare(strict_types=1);

namespace Main\Domain\Task\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Main\Domain\Task\DTO\CreateDTO;

final class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }

    public function getDTO(): CreateDTO
    {
        return new CreateDTO(
            $this->validated('title'),
            $this->validated('description')
        );
    }
}
