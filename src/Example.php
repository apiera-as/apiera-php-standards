<?php

declare(strict_types=1);

namespace Apiera\PhpStandards;

use InvalidArgumentException;
use RuntimeException;

/**
 * Example class demonstrating all coding standards and static analysis rules
 *
 * This class serves as a reference implementation of our coding standards,
 * including proper documentation, type declarations, and error handling.
 *
 * @package PhpStandards
 *
 * @author fredrik-tveraaen <fredrik.tveraaen@apiera.io>
 *
 * @since 1.0.0
 */
final class Example
{
    private string $name;

    /** @var array<string, int> */
    private array $items;

    public const string TEST = '';

    /**
     *  Constructor
     *
     * @param string $name Initial name value.
     *
     * @throws InvalidArgumentException If name is empty.
     */
    public function __construct(string $name)
    {
        if (empty($name)) {
            throw new InvalidArgumentException('Name cannot be empty');
        }

        $this->name = $name;
        $this->items = [];
    }

    /**
     * Add an item to the collection
     *
     * @throws RuntimeException If item already exists.
     */
    public function addItem(string $item): void
    {
        if (\in_array($item, $this->items, true)) {
            throw new RuntimeException(\sprintf('Item "%s" already exists', $item));
        }

        $this->items[] = $item;
    }

    /**
     * Get items matching a search term.
     *
     * @param string $search Search term.
     *
     * @return array<int, string> Matching items.
     */
    public function findItems(string $search): array
    {
        return \array_filter(
            $this->items,
            static fn (string $item): bool => \str_contains($item, $search)
        );
    }

    /**
     * Get total number of items
     *
     * @return integer Total number of items.
     */
    public function getItemCount(): int
    {
        return \count($this->items);
    }

    /**
     * Get current name
     *
     * @return string Current name.
     */
    public function getName(): string
    {
        return $this->name;
    }
}
