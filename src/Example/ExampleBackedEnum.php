<?php

declare(strict_types=1);

namespace Apiera\PhpStandards\Example;

/**
 * Example backed enum demonstrating proper case formatting.
 *
 * @author  fredrik-tveraaen <fredrik.tveraaen@apiera.io>
 * @since   1.0.0
 */
enum ExampleBackedEnum: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case COMPLETED = 'completed';
    case FAILED = 'failed';
}
