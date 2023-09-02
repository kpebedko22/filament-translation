<?php

namespace Kpebedko22\FilamentTranslation\Concerns;

trait HasLabelAttributes
{
    private string $labelKey = 'label';

    private string $labelListKey = 'list';

    private string $labelCreateKey = 'create';

    private string $labelViewKey = 'view';

    private string $labelEditKey = 'edit';

    public function labelKey(string $key): static
    {
        $this->labelKey = $key;

        return $this;
    }

    public function labelListKey(string $key): static
    {
        $this->labelListKey = $key;

        return $this;
    }

    public function labelCreateKey(string $key): static
    {
        $this->labelCreateKey = $key;

        return $this;
    }

    public function labelViewKey(string $key): static
    {
        $this->labelViewKey = $key;

        return $this;
    }

    public function labelEditKey(string $key): static
    {
        $this->labelEditKey = $key;

        return $this;
    }
}
