<?php

declare(strict_types=1);

namespace Apiera\PhpStandards\Example;

use DateTimeImmutable;

/**
 * Example abstract class demonstrating proper inheritance and implementation.
 *
 * @author  fredrik-tveraaen <fredrik.tveraaen@apiera.io>
 * @since   1.0.0
 */
abstract class ExampleAbstractClass implements ExampleInterface
{
    use ExampleTrait;

    /** @var array<string, mixed> */
    protected array $config;

    /**
     * @param array<string, mixed> $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->createdAt = new DateTimeImmutable();
        $this->creator = 'system';
    }

    public function validateInput(mixed $data): bool
    {
        return is_array($data) && count($data) > 0;
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return array<string, mixed>
     */
    abstract protected function transform(array $data): array;
}
