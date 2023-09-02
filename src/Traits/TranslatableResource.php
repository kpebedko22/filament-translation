<?php

namespace Kpebedko22\FilamentTranslation\Traits;

use Kpebedko22\FilamentTranslation\FilamentTranslation;

trait TranslatableResource
{
    abstract public static function translation(): FilamentTranslation;

    public static function getModelLabel(): string
    {
        return static::translation()->getLabelList();
    }

    public static function getPluralModelLabel(): string
    {
        return static::translation()->getLabelList();
    }

    public static function getNavigationLabel(): string
    {
        return static::translation()->getLabelList();
    }

    public static function getBreadcrumb(): string
    {
        return static::translation()->getLabelList();
    }
}
