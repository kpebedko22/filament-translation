<?php

namespace Kpebedko22\FilamentTranslation\Traits;

use Filament\Forms\Components\Field;
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\Filter;

trait Translatable
{
    abstract public static function transKey(): string;

    public static function trans(array $components, array $commons = []): array
    {
        $path = self::getTransPath();
        $attributeKey = self::getTransAttributeKey();
        $placeholderKey = self::getTransPlaceholderKey();

        $commonPath = self::getTransCommonPath();
        $commonAttributeKey = self::getTransCommonAttributeKey();
        $commonPlaceholderKey = self::getTransCommonPlaceholderKey();

        return collect($components)
            ->filter(function ($component) {
                return $component instanceof Field ||
                    $component instanceof Column ||
                    $component instanceof Filter;
            })
            ->each(function (Field|Column|Filter $component) use (
                $path,
                $attributeKey,
                $placeholderKey,
                $commons,
                $commonPath,
                $commonAttributeKey,
                $commonPlaceholderKey,
            ) {

                $name = $component->getName();

                [$usePath, $useAttrKey, $usePlaceholderKey] = in_array($name, $commons)
                    ? [$commonPath, $commonAttributeKey, $commonPlaceholderKey]
                    : [$path, $attributeKey, $placeholderKey];

                $component->translate($usePath, $useAttrKey, $usePlaceholderKey);
            })
            ->toArray();
    }

    public static function transFor(string $key, array $replace = [], ?string $locale = null, bool $useCommon = false): string
    {
        $path = $useCommon ? self::getTransPath() : self::getTransCommonPath();

        return __("$path.$key", $replace, $locale);
    }

    public static function getTransPath(): string
    {
        $relPath = self::useTransRelativePath()
            ? config('filament-translation.path')
            : '';

        return $relPath . self::transKey();
    }

    public static function useTransRelativePath(): bool
    {
        return config('filament-translation.use_path');
    }

    public static function getTransAttributeKey(): string
    {
        return config('filament-translation.attribute_key');
    }

    public static function getTransPlaceholderKey(): string
    {
        return config('filament-translation.placeholder_key');
    }

    public static function getTransCommonPath(): string
    {
        return config('filament-translation.common.path');
    }

    public static function getTransCommonAttributeKey(): string
    {
        return config('filament-translation.common.attribute_key');
    }

    public static function getTransCommonPlaceholderKey(): string
    {
        return config('filament-translation.common.placeholder_key');
    }
}
