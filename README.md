# PHP Coding Standard

Unified standards for code/project quality assurance of all my php projects.

## Install

```
$ composer require --dev kraska/coding-standard ergebnis/composer-normalize friendsofphp/php-cs-fixer phpstan/phpstan phpstan/phpstan-phpunit roave/security-advisories:dev-latest
```

## Setup

```php
// php-cs-fixer.dist.php
<?php

declare(strict_types=1);

use Kraska\CodingStandard\PhpCsFixerRuleSetFactory;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setRules(PhpCsFixerRuleSetFactory::create())
    ->setRiskyAllowed(true)
    ->setFinder($finder);
```

```yaml
# phpstan.dist.neon
includes:
  - vendor/phpstan/phpstan-phpunit/extension.neon
parameters:
  level: 8
  paths:
    - ./
  excludePaths:
    - ./vendor/*
```

```.gitignore
# .gitignore

### php-cs-fixer ###
.php-cs-fixer.cache
```

## Scripts

```json
// composer.json
{
  "scripts": {
    "php:fix": [
      "composer normalize",
      "php vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php --verbose"
    ],
    "php:lint": [
      "composer normalize --dry-run --diff",
      "php vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php --verbose --dry-run --diff",
      "php vendor/bin/phpstan analyse --configuration=phpstan.dist.neon"
    ]
  }
}
```