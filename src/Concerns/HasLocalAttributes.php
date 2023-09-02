<?php

namespace Kpebedko22\FilamentTranslation\Concerns;

trait HasLocalAttributes
{
    private string $filename;

    private string $localPath = 'filament/resource/';

    private string $localAttributeKey = 'attribute';

    private string $localPlaceholderKey = 'placeholder';

    public function localConfig(): array
    {
        return [
            $this->localPath . $this->filename,
            $this->localAttributeKey,
            $this->localPlaceholderKey,
        ];
    }

    public function localPath(string $path): static
    {
        $this->localPath = $path;

        return $this;
    }

    public function localAttributeKey(string $key): static
    {
        $this->localAttributeKey = $key;

        return $this;
    }

    public function localPlaceholderKey(string $key): static
    {
        $this->localPlaceholderKey = $key;

        return $this;
    }
}
