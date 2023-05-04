<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait TranslatableResource
{
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
