<?php

namespace Kpebedko22\FilamentTranslation\Mixins;

use Closure;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class ViewComponentMixin
{
    public function translate(): Closure
    {
        return function (
            string $path,
            string $labelKey = 'common',
            string $placeholderKey = 'placeholder'
        ): self {
            $class = get_class($this);

            switch ($class) {
                case TextInput::class:
                case Select::class:
                case Textarea::class:

                    /** @var TextInput|Select|Textarea $this */

                    $name = $this->getName();

                    $this->label(__("$path.$labelKey.$name"))
                        ->placeholder(__("$path.$placeholderKey.$name"));

                    break;
                case Checkbox::class:
                    /** @var Checkbox $this */

                    $name = $this->getName();
                    $this->label(__("$path.$labelKey.$name"));

                    break;

                case TextColumn::class:
                    /** @var TextColumn $this */


                default:
                    break;
            }

            return $this;
        };
    }
}
