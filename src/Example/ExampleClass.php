<?php

declare(strict_types=1);

namespace Apiera\PhpStandards\Example;

use InvalidArgumentException;
use JsonSerializable;

/**
 * Example concrete class demonstrating full implementation with all features.
 *
 * @author  fredrik-tveraaen <fredrik.tveraaen@apiera.io>
 * @since   1.0.0
 */
final class ExampleClass extends ExampleAbstractClass implements JsonSerializable
{
    private const int MAX_ITEMS = 100;

    private ExampleBackedEnum $status;

    private ExampleEnum $priority;

    /**
     * @param array<string, mixed> $config
     */
    public function __construct(
        array $config,
        private readonly string $name,
        private readonly int $maxItems = self::MAX_ITEMS,
    ) {
        parent::__construct($config);

        $this->status = ExampleBackedEnum::PENDING;
        $this->priority = ExampleEnum::MEDIUM;
    }

    /**
     * @return string[]
     */
    public function processData(string $input): array
    {
        if ($input === '') {
            throw new InvalidArgumentException('Input cannot be empty');
        }

        $data = json_decode($input, true);

        if (!$this->validateInput($data)) {
            throw new InvalidArgumentException('Invalid input format');
        }

        return $this->transform($data);
    }

    /**
     * @return array<string, string|int>
     */
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'status' => $this->status->value,
            'priority' => $this->priority->name,
            'maxItems' => $this->maxItems,
        ];
    }

    /**
     * @param array<mixed> $data
     *
     * @return string[]
     */
    protected function transform(array $data): array
    {
        $result = array_map(
            fn (mixed $item): string => is_array($item) ? json_encode($item) : (string) $item,
            array_slice($data, 0, $this->maxItems)
        );

        $this->status = ExampleBackedEnum::COMPLETED;

        return $result;
    }
}
