<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait Translatable
{
    abstract public static function transKey(): string;

    public static function trans(array $components): array
    {
        $path = self::getTransPath();
        
        return collect($components)
            ->each(function ($component) use ($path) {
                $component->translate($path);
            })
            ->toArray();
    }

    public static function transFor(string $key, array $replace = [], ?string $locale = null): string
    {
        return __(self::getTransPath() . '.' . $key, $replace, $locale);
    }

    public static function getTransPath(): string
    {
        $relPath = self::useTranslateRelativePath()
            ? config('filament-translation.path')
            : '';

        return $relPath . self::transKey();
    }

    public static function useTranslateRelativePath(): bool
    {
        return config('filament-translation.use_path');
    }
}
