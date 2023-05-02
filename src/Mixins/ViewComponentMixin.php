<?php

namespace Kpebedko22\FilamentTranslation\Mixins;

use Closure;
use Filament\Forms\Components\Concerns\HasPlaceholder;
use Filament\Forms\Components\Field;
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\Filter;

class ViewComponentMixin
{
    public function translate(): Closure
    {
        return function (
            string $path,
            string $labelKey,
            string $placeholderKey,
        ): self {

            $closure = match (true) {
                $this instanceof Field => function () use ($path, $labelKey, $placeholderKey) {

                    /** @var Field $this */
                    $name = $this->getName();

                    $this->label(__("$path.$labelKey.$name"));

                    if (in_array(HasPlaceholder::class, class_uses_recursive(get_class($this)))) {
                        /** @var HasPlaceholder $this */
                        $this->placeholder(__("$path.$placeholderKey.$name"));
                    }
                },

                $this instanceof Column => function () use ($path, $labelKey) {
                    /** @var Column $this */
                    $name = $this->getName();

                    $this->label(__("$path.$labelKey.$name"));
                },

                $this instanceof Filter => function () use ($path, $labelKey) {
                    /** @var Filter $this */
                    $name = $this->getName();

                    $this->label(__("$path.$labelKey.$name"));
                }
            };

            $closure();

            return $this;
        };
    }
}
