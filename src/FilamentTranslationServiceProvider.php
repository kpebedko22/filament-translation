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
//        $this->bootConfig();
    }

    public function register(): void
    {
//        $this->registerConfig();
    }

//    protected function registerConfig(): void
//    {
//        $this->mergeConfigFrom(__DIR__ . '/../config/filament-translation.php', 'filament-translation');
//    }
//
//    public function bootConfig(): void
//    {
//        if ($this->app->runningInConsole()) {
//            $this->publishes([
//                __DIR__ . '/../config/filament-translation.php' => config_path('filament-translation.php'),
//            ], 'filament-translation-config');
//        }
//    }

    public function bootMixins(): void
    {
        ViewComponent::mixin(new ViewComponentMixin);
    }
}
