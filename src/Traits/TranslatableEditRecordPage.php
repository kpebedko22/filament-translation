<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait TranslatableEditRecordPage
{
    public function getTitle(): string
    {
        return $this->getResource()::translation()->getLabelEdit();
    }
}
