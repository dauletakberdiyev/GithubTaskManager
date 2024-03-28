<?php

declare(strict_types=1);

namespace App\Requests;

use App\DTO\CreateDTO;
use Illuminate\Foundation\Http\FormRequest;

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
