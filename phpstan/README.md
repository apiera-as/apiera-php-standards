# PHPStan Configuration

Static analysis configuration with:
- Level 8 (maximum) checks
- Strict typing enforcement
- Callable signature checks

## Usage

```json
{
    "scripts": {
        "stan": "phpstan analyse -c vendor/apiera/php-standards/phpstan/phpstan.neon src/"
    }
}
```

## Customization

Create `phpstan.neon` in your project to extend these rules:

```yaml
includes:
    - vendor/apiera/php-standards/phpstan/phpstan.neon

parameters:
    # Your custom parameters
```