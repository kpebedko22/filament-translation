<?php

namespace Kpebedko22\FilamentTranslation;

use Illuminate\Support\Traits\Macroable;
use Kpebedko22\FilamentTranslation\Concerns\HasGlobalAttributes;
use Kpebedko22\FilamentTranslation\Concerns\HasLabelAttributes;
use Kpebedko22\FilamentTranslation\Concerns\HasLocalAttributes;

final class FilamentTranslation
{
    use Macroable,
        HasLocalAttributes,
        HasGlobalAttributes,
        HasLabelAttributes;

    /**
     * Unique class name for manager
     */
    private string $class;

    /**
     * Path to file with translation
     */
    private string $filename;

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

    public function getClass(): string
    {
        return $this->class;
    }

    public function transFor(string $key, array $replace = [], ?string $locale = null, bool $useGlobal = false): string
    {
        $path = $useGlobal
            ? $this->globalPath
            : $this->localPath . $this->filename;

        return __("$path.$key", $replace, $locale);
    }

    public function getLabelList(): string
    {
        return $this->transFor("$this->labelKey.$this->labelListKey");
    }

    public function getLabelView(): string
    {
        return $this->transFor("$this->labelKey.$this->labelViewKey");
    }

    public function getLabelCreate(): string
    {
        return $this->transFor("$this->labelKey.$this->labelCreateKey");
    }

    public function getLabelEdit(): string
    {
        return $this->transFor("$this->labelKey.$this->labelEditKey");
    }
}
