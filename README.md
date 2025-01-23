# Apiera PHP Standards

Central repository for PHP coding standards and static analysis configurations.

## Installation

```bash
composer require apiera/php-standards --dev
```

## Components
- [PHP_CodeSniffer Rules](phpcs/README.md)
- [PHPStan Configuration](phpstan/README.md)

## Usage

Add to your composer.json:
```json
{
    "scripts": {
        "cs": "phpcs --standard=vendor/apiera/php-standards/phpcs/ruleset.xml src/",
        "cs:fix": "phpcbf --standard=vendor/apiera/php-standards/phpcs/ruleset.xml src/",
        "stan": "phpstan analyse -c vendor/apiera/php-standards/phpstan/phpstan.neon src/",
        "analyse": [
            "@cs",
            "@stan"
        ]
    }
}
```

Then run:
```bash
composer cs      # Check code style
composer cs:fix  # Fix code style issues
composer stan    # Run static analysis
composer analyse # Run all checks
```