<?php

namespace Kpebedko22\FilamentTranslation\Concerns;

trait HasGlobalAttributes
{
    private bool $isUsingGlobal = true;

    private array $globalAttributes = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    private string $globalPath = 'filament/global';

    private string $globalAttributeKey = 'attribute';

    private string $globalPlaceholderKey = 'placeholder';

    public function hasGlobal(string $attribute): bool
    {
        return in_array($attribute, $this->globalAttributes);
    }

    public function getConfigForGlobal(): array
    {
        return [
            $this->globalPath,
            $this->globalAttributeKey,
            $this->globalPlaceholderKey,
        ];
    }

    public function isUsingGlobal(bool $isUsing): static
    {
        $this->isUsingGlobal = $isUsing;

        return $this;
    }

    public function globalAttributes(array $globalAttributes): static
    {
        $this->globalAttributes = $globalAttributes;

        return $this;
    }

    public function globalAttributeKey(string $key): static
    {
        $this->globalAttributeKey = $key;

        return $this;
    }

    public function globalPlaceholderKey(string $key): static
    {
        $this->globalPlaceholderKey = $key;

        return $this;
    }

//    public function common(
//        ?bool   $isUsing = null,
//        ?string $path = null,
//        ?string $attr = null,
//        ?string $placeholder = null,
//        ?array  $attributes = null,
//    ): FilamentTranslation
//    {
//        $this->commonPath = $path ?: config('filament-translation.common.path');
//        $this->commonAttributeKey = $attr ?: config('filament-translation.common.attribute_key');
//        $this->commonPlaceholderKey = $placeholder ?: config('filament-translation.common.placeholder_key');
//
//        $this->commonIsUsing = $isUsing === null
//            ? config('filament-translation.common.is_using')
//            : $isUsing;
//
//        $this->commonAttributes = $attributes === null
//            ? config('filament-translation.common.attributes')
//            : $attributes;
//
//        return $this;
//    }
}
