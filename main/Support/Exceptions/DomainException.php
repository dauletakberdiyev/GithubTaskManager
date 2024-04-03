<?php

declare(strict_types=1);

namespace Main\Support\Exceptions;

final class DomainException extends Exception
{
    protected bool $visible = true;
}
