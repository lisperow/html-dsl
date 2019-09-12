<?php

namespace Html\Dsl\Runner;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

function buildAttrs($tag)
{
    return collect($tag)
        ->except(['name', 'tagType', 'body'])
        ->map(function ($value, $key) {
            return " {$key}=\"{$value}\"";
        })->join('');
}

function run($tag)
{
    $mapping = [
        'single' => function ($tag) {
            $attrs = buildAttrs($tag);
            return "<{$tag['name']}{$attrs}>";
        },
        'pair' => function ($tag) {
            $attrs = buildAttrs($tag);
            return "<{$tag['name']}{$attrs}>{$tag['body']}</{$tag['name']}>";
        }
    ];

    $build = $mapping[$tag['tagType']];
    return $build($tag);
}
