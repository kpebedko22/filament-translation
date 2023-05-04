<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait TranslatableEditRecordPage
{
    protected function getTitle(): string
    {
        return $this->getResource()::translation()->getLabelEdit();
    }
}
