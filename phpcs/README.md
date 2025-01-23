# PHP CodeSniffer Rules

Code style rules enforcing:
- PSR-12 base standard
- Strict types declaration
- File and class documentation requirements
- 120 character line length
- Short array syntax

## Usage

```json
{
    "scripts": {
        "cs": "phpcs --standard=vendor/apiera/php-standards/phpcs/ruleset.xml src/",
        "cs:fix": "phpcbf --standard=vendor/apiera/php-standards/phpcs/ruleset.xml src/"
    }
}
```