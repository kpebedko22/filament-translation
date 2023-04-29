<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait Translatable
{
    abstract public function transKey(): string;

    public static function trans(array $components): array
    {
        return collect($components)
            ->map(function ($component) {
                $component->translate();
            })
            ->toArray();
    }
}
