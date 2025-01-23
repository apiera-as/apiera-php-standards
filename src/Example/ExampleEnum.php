<?php

declare(strict_types=1);

namespace Apiera\PhpStandards\Example;

/**
 * Example enum demonstrating pure enum cases.
 *
 * @author  fredrik-tveraaen <fredrik.tveraaen@apiera.io>
 * @since   1.0.0
 */
enum ExampleEnum
{
    case HIGH;
    case MEDIUM;
    case LOW;
}
