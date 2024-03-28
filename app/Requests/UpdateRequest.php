<?php

declare(strict_types=1);

namespace App\Requests;

use App\DTO\UpdateDTO;
use Illuminate\Foundation\Http\FormRequest;

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
