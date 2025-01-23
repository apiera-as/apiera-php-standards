<?php

declare(strict_types=1);

namespace Apiera\PhpStandards\Example;

/**
 * Example interface demonstrating proper documentation and method typing.
 *
 * @author  fredrik-tveraaen <fredrik.tveraaen@apiera.io>
 * @since   1.0.0
 */
interface ExampleInterface
{
    /**
     * @return array<string, mixed>
     */
    public function processData(string $input): array;

    public function validateInput(mixed $data): bool;
}
