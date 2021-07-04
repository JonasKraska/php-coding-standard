<?php

declare(strict_types=1);

namespace Kraska\CodingStandard;

class PhpCsFixerRuleSetFactory {

    /** @return array<string, mixed> */
    public static function create(): array
    {
        return [
                '@PSR12' => true,
                '@Symfony' => true,

                // for reference: https://mlocati.github.io/php-cs-fixer-configurator
                'declare_strict_types' => true,
                'strict_comparison' => true,
                'strict_param' => true,
            ];
    }
}

