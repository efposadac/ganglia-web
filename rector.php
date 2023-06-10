<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/api',
        __DIR__ . '/debian',
        __DIR__ . '/dwoo',
        __DIR__ . '/graph.d',
        __DIR__ . '/lib',
        __DIR__ . '/nagios',
        __DIR__ . '/test',
    ]);

    $rectorConfig->fileExtensions(['php', 'phtml']);

    // register a single rule
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);

    // register single rule
    //$rectorConfig->rule(TypedPropertyFromStrictConstructorRector::class);

    // define sets of rules
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_80
        //SetList::CODE_QUALITY
    ]);
};
