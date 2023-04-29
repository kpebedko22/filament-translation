<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait Translatable
{
    abstract public static function transKey(): string;

    public static function trans(array $components): array
    {
        return collect($components)
            ->each(function ($component) {
                if (method_exists($component, 'translate')) {
                    $component->translate(self::getTransPath());
                }
            })
            ->toArray();
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
