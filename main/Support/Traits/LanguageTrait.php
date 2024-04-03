<?php

declare(strict_types=1);

namespace Main\Support\Traits;

trait LanguageTrait
{
    public static function translate(string $key, array $replacements = [], ?string $locale = null): string
    {
        return (string) __($key, $replacements, $locale);
    }
}
