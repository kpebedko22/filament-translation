<?php

namespace Kpebedko22\FilamentTranslation;

use Filament\Forms\Components;
use Filament\Support\Components\ViewComponent;
use Illuminate\Support\ServiceProvider;

class FilamentTranslationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->bootMacros();
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
        $this->publishes([
            __DIR__ . '/../config/filament-translation.php' => config_path('filament-translation.php'),
        ], 'config');
    }

    public function bootMacros()
    {
        ViewComponent::macro('translate', function (
            string $path,
            string $labelKey = 'common',
            string $placeholderKey = 'placeholder',
        ) {
            $class = get_class($this);

            switch ($class) {
                case Components\TextInput::class:
                case Components\Select::class:
                case Components\Textarea::class:

                    /** @var Components\TextInput|Components\Select|Components\Textarea $this */

                    $name = $this->getName();

                    $this->label(__("$path.$labelKey.$name"))
                        ->placeholder(__("$path.$placeholderKey.$name"));

                    break;
                case Components\Checkbox::class:
                    /** @var Components\Checkbox $this */

                    $name = $this->getName();
                    $this->label(__("$path.$labelKey.$name"));

                    break;
                default:
                    break;
            }

            return $this;
        });
    }
}
