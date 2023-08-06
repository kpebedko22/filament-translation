<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait TranslatableViewRecordPage
{
    public function getTitle(): string
    {
        return $this->getResource()::translation()->getLabelView();
    }
}
