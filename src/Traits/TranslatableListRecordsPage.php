<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait TranslatableListRecordsPage
{
    public function getTitle(): string
    {
        return $this->getResource()::translation()->getLabelList();
    }
}
