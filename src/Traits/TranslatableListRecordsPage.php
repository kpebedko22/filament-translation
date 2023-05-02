<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait TranslatableListRecordsPage
{
    protected function getTitle(): string
    {
        return $this->getResource()::transFor($this->getTransTitleKey());
    }

    protected function getTransTitleKey(): string
    {
        return config('filament-translation.page.list');
    }
}
