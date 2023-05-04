<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait TranslatableViewRecordPage
{
    protected function getTitle(): string
    {
        return $this->getResource()::translation()->getLabelView();
    }
}
