<?php

namespace Kpebedko22\FilamentTranslation\Concerns;

trait HasGlobalAttributes
{
    private bool $globalInUse = true;

    private string $globalPath = 'filament/global';

    private string $globalAttributeKey = 'attribute';

    private string $globalPlaceholderKey = 'placeholder';

    private array $globalAttributes = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    private array $globalAttributesToIgnore = [];

    public function globalHas(string $attribute): bool
    {
        return in_array(
            $attribute,
            array_diff($this->globalAttributes, $this->globalAttributesToIgnore)
        );
    }

    public function globalConfig(): array
    {
        return [
            $this->globalPath,
            $this->globalAttributeKey,
            $this->globalPlaceholderKey,
        ];
    }

    public function globalInUse(bool $inUse): static
    {
        $this->globalInUse = $inUse;

        return $this;
    }

    public function globalPath(string $path): static
    {
        $this->globalPath = $path;

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

    public function globalAttributes(array $attributes): static
    {
        $this->globalAttributes = $attributes;

        return $this;
    }

    public function globalAttributesToIgnore(array $attributes): static
    {
        $this->globalAttributesToIgnore = $attributes;

        return $this;
    }
}
