<?php

namespace Kpebedko22\FilamentTranslation\Traits;

trait TranslatableCreateRecordPage
{
    public function getTitle(): string
    {
        return $this->getResource()::translation()->getLabelCreate();
    }
}
