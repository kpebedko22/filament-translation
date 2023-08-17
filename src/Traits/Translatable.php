<?php

namespace Kpebedko22\FilamentTranslation\Traits;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\Filter;
use Kpebedko22\FilamentTranslation\FilamentTranslation;

trait Translatable
{
    abstract public static function translation(): FilamentTranslation;

    public static function trans(array $components): array
    {
        $translation = static::translation();

        array_walk($components, static function ($component) use ($translation) {

            if ($component instanceof Field ||
                $component instanceof Placeholder ||
                $component instanceof Column ||
                $component instanceof Filter
            ) {
                $name = $component->getName();
                $useCommon = $translation->hasCommon($name);

                [$path, $attrKey, $placeholderKey] = $useCommon
                    ? $translation->forCommon()
                    : $translation->forUsual();

                $component->translate($path, $attrKey, $placeholderKey);
            }
        });

        return $components;
    }

    public static function transFor(
        string  $key,
        array   $replace = [],
        ?string $locale = null,
        bool    $useCommon = false
    ): string
    {
        return static::translation()->transFor($key, $replace, $locale, $useCommon);
    }
}
