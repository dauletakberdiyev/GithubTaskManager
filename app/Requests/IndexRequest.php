<?php

declare(strict_types=1);

namespace App\Requests;

use App\DTO\IndexDTO;
use Illuminate\Foundation\Http\FormRequest;

final class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sorting_by' => ['nullable', 'string'],
        ];
    }

    public function getDTO(): IndexDTO
    {
        return new IndexDTO(
            $this->validated('sorting_by'),
        );
    }
}
