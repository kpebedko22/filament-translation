<?php

namespace Kpebedko22\FilamentTranslation;

final class FilamentTranslation
{
    /**
     * Unique key of translation config
     */
    protected string $key;

    /**
     * File with translations
     */
    protected string $filename;

    protected string $path;
    protected string $attributeKey;
    protected string $placeholderKey;

    protected bool $commonIsUsing;
    protected string $commonPath;
    protected string $commonAttributeKey;
    protected string $commonPlaceholderKey;
    protected array $commonAttributes;

    protected string $labelKey;
    protected string $labelList;
    protected string $labelView;
    protected string $labelEdit;
    protected string $labelCreate;

    protected function __construct(
        string  $resource,
        string  $filename,
        ?string $attr = null,
        ?string $placeholder = null,
    )
    {
        $this->key = $resource;
        $this->filename = $filename;

        $this->path();
        $this->attributeKey($attr);
        $this->placeholderKey($placeholder);
        $this->common();
        $this->labels();
    }

    /**
     * @param string $resource Name of filament resource
     * @param string $filename Name of file with translations
     * @param string|null $attr Attribute key, if set null then used value from config
     * @param string|null $placeholder Placeholder key, if set null then used value from config
     * @return FilamentTranslation
     */
    public static function make(
        string  $resource,
        string  $filename,
        ?string $attr = null,
        ?string $placeholder = null,
    ): FilamentTranslation
    {
        $instance = FilamentTranslationManager::getInstance()->get($resource);

        if (!$instance) {
            // TODO: try cloning object
            $instance = new self($resource, $filename, $attr, $placeholder);

            FilamentTranslationManager::getInstance()->save($instance);
        }

        return $instance;
    }

    public function path(?string $path = null): FilamentTranslation
    {
        $this->path = $path ?: config('filament-translation.path');

        return $this;
    }

    public function attributeKey(?string $key = null): FilamentTranslation
    {
        $this->attributeKey = $key ?: config('filament-translation.attribute_key');

        return $this;
    }

    public function placeholderKey(?string $key = null): FilamentTranslation
    {
        $this->placeholderKey = $key ?: config('filament-translation.placeholder_key');

        return $this;
    }

    public function hasCommon(string $attr): bool
    {
        return in_array($attr, $this->commonAttributes);
    }

    public function common(
        ?bool   $isUsing = null,
        ?string $path = null,
        ?string $attr = null,
        ?string $placeholder = null,
        ?array  $attributes = null,
    ): FilamentTranslation
    {
        $this->commonPath = $path ?: config('filament-translation.common.path');
        $this->commonAttributeKey = $attr ?: config('filament-translation.common.attribute_key');
        $this->commonPlaceholderKey = $placeholder ?: config('filament-translation.common.placeholder_key');

        $this->commonIsUsing = $isUsing === null
            ? config('filament-translation.common.is_using')
            : $isUsing;

        $this->commonAttributes = $attributes === null
            ? config('filament-translation.common.attributes')
            : $attributes;

        return $this;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function transFor(
        string  $key,
        array   $replace = [],
        ?string $locale = null,
        bool    $useCommon = false
    )
    {
        $path = $useCommon
            ? $this->commonPath
            : $this->path . $this->filename;

        return __("$path.$key", $replace, $locale);
    }

    public function forCommon(): array
    {
        return [
            $this->commonPath,
            $this->commonAttributeKey,
            $this->commonPlaceholderKey,
        ];
    }

    public function forUsual(): array
    {
        return [
            $this->path . $this->filename,
            $this->attributeKey,
            $this->placeholderKey,
        ];
    }

    public function labels(
        ?string $key = null,
        ?string $list = null,
        ?string $view = null,
        ?string $edit = null,
        ?string $create = null,
    ): FilamentTranslation
    {
        $this->labelKey = $key ?: config('filament-translation.label_key');
        $this->labelList = $list ?: config('filament-translation.label.list');
        $this->labelView = $view ?: config('filament-translation.label.view');
        $this->labelEdit = $edit ?: config('filament-translation.label.edit');
        $this->labelCreate = $create ?: config('filament-translation.label.create');

        return $this;
    }

    public function getLabelList(): string
    {
        return $this->transFor("$this->labelKey.$this->labelList");
    }

    public function getLabelView(): string
    {
        return $this->transFor("$this->labelKey.$this->labelView");
    }

    public function getLabelCreate(): string
    {
        return $this->transFor("$this->labelKey.$this->labelCreate");
    }

    public function getLabelEdit(): string
    {
        return $this->transFor("$this->labelKey.$this->labelEdit");
    }
}
