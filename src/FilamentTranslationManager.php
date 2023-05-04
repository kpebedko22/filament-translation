<?php

namespace Kpebedko22\FilamentTranslation;

use RuntimeException;

final class FilamentTranslationManager
{
    private static ?FilamentTranslationManager $instance = null;

    private array $cached;

    public static function getInstance(): FilamentTranslationManager
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
        $this->cached = [];
    }

    public function get(string $key): ?FilamentTranslation
    {
        return $this->cached[$key] ?? null;
    }

    public function save(FilamentTranslation $translation): FilamentTranslationManager
    {
        $this->cached[$translation->getKey()] = $translation;

        return $this;
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new RuntimeException("Cannot unserialize singleton");
    }
}
