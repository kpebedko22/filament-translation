<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait TranslatableCreateRecordPage
{
    protected function getTitle(): string
    {
        return $this->getResource()::translation()->getLabelCreate();
    }
}
