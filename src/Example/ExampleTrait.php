<?php

declare(strict_types=1);

namespace Apiera\PhpStandards\Example;

use DateTimeImmutable;

/**
 * Example trait demonstrating property and method implementation.
 *
 * @author  fredrik-tveraaen <fredrik.tveraaen@apiera.io>
 * @since   1.0.0
 */
trait ExampleTrait
{
    private DateTimeImmutable $createdAt;

    private string $creator;

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getCreator(): string
    {
        return $this->creator;
    }
}
