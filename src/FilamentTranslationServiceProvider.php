<?php

namespace Kpebedko22\FilamentTranslation;

use Filament\Support\Components\ViewComponent;
use Illuminate\Support\ServiceProvider;
use Kpebedko22\FilamentTranslation\Mixins\ViewComponentMixin;

class FilamentTranslationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->bootMixins();
    }

    public function register(): void
    {
    }

    public function bootMixins(): void
    {
        ViewComponent::mixin(new ViewComponentMixin);
    }
}
