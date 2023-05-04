<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait TranslatableListRecordsPage
{
    protected function getTitle(): string
    {
        return $this->getResource()::translation()->getLabelList();
    }
}
