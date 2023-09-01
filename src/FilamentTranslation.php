<?php

namespace Kpebedko22\FilamentTranslation;

use Illuminate\Support\Traits\Macroable;
use Kpebedko22\FilamentTranslation\Concerns\HasGlobalAttributes;

final class FilamentTranslation
{
    use Macroable,
        HasGlobalAttributes;

    /**
     * Unique class name for manager
     */
    private string $class;

    /**
     * Path to file with translation
     */
    private string $filename;

    // TODO: основные настройки, где лежит файл, где лежат аттрибуеты и их плейсхолдеры
    private string $path = 'filament/resource/';
    private string $attributeKey = 'attribute';
    private string $placeholderKey = 'placeholder';

    protected function __construct(string $class, string $filename)
    {
        $this->class = $class;
        $this->filename = $filename;
    }

    /**
     * @param string $class Name of class
     * @param string $filename Name of file with translations
     *
     * @return FilamentTranslation
     */
    public static function make(string $class, string $filename): FilamentTranslation
    {
        $manager = FilamentTranslationManager::getInstance();

        $instance = $manager->get($class);

        if ($instance === null) {
            $instance = new self($class, $filename);

            $manager->save($instance);
        }

        return $instance;
    }

    public function path(string $path): FilamentTranslation
    {
        $this->path = $path;

        return $this;
    }

    public function attributeKey(string $key): FilamentTranslation
    {
        $this->attributeKey = $key;

        return $this;
    }

    public function placeholderKey(string $key): FilamentTranslation
    {
        $this->placeholderKey = $key;

        return $this;
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function getConfigForDefault(): array
    {
        return [
            $this->path . $this->filename,
            $this->attributeKey,
            $this->placeholderKey,
        ];
    }

    public function transFor(string $key, array $replace = [], ?string $locale = null, bool $useGlobal = false): string
    {
        $path = $useGlobal
            ? $this->globalPath
            : $this->path . $this->filename;

        return __("$path.$key", $replace, $locale);
    }

    // TODO: то что ниже - надо рефакторить на concerns

    protected string $labelKey;
    protected string $labelList;
    protected string $labelView;
    protected string $labelEdit;
    protected string $labelCreate;

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
