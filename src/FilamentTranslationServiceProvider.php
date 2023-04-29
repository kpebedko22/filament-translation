<?php

namespace Kpebedko22\FilamentTranslation;

use Kpebedko22\FilamentTranslation\Mixins\ViewComponentMixin;
use Filament\Support\Components\ViewComponent;
use Illuminate\Support\ServiceProvider;

class FilamentTranslationServiceProvider extends ServiceProvider
{
    protected array $mixins = [
        ViewComponent::class => ViewComponentMixin::class,
    ];

    public function boot(): void
    {
        $this->bootMixins();
        $this->bootConfig();
    }

    public function register()
    {
        $this->registerConfig();
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/filament-translation.php', 'filament-translation');
    }

    public function bootConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/filament-translation.php' => config_path('filament-translation.php'),
            ], 'filament-translation-config');
        }
    }

    public function bootMixins()
    {
        foreach ($this->mixins as $class => $mixin) {
            $class::mixin(new $mixin);
        }
    }
}
