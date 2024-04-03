<?php

declare(strict_types=1);

namespace Main\Domain\Task\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Main\Domain\Task\DTO\IndexDTO;

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
