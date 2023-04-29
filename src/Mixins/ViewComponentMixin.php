<?php

namespace Kpebedko22\FilamentTranslation\Mixins;

use Closure;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\Filter;

class ViewComponentMixin
{
    public function translate(): Closure
    {
        return function (
            string $path,
            string $labelKey = 'common',
            string $placeholderKey = 'placeholder'
        ): self {
//            $class = get_class($this);

            $closure = match (true) {
                $this instanceof Field => function () use ($path, $labelKey, $placeholderKey) {

                    /** @var TextInput|Select|Textarea $this */

                    // TODO: Field doesnt have placeholder
                    $name = $this->getName();

                    $this->label(__("$path.$labelKey.$name"))
                        ->placeholder(__("$path.$placeholderKey.$name"));
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
//            switch ($class) {
//                case TextInput::class:
//                case Select::class:
//                case Textarea::class:
//
//                    /** @var TextInput|Select|Textarea $this */
//
//                    $name = $this->getName();
//
//                    $this->label(__("$path.$labelKey.$name"))
//                        ->placeholder(__("$path.$placeholderKey.$name"));
//
//                    break;
//                case Checkbox::class:
//                case Toggle::class:
//                    /** @var Checkbox|Toggle $this */
//
//                    $name = $this->getName();
//                    $this->label(__("$path.$labelKey.$name"));
//
//                    break;
//
//                case Column::class:
//                    /** @var Column $this */
//                    $name = $this->getName();
//
//                    $this->label(__("$path.$labelKey.$name"));
//
//                    break;
//
//                case Filter::class:
//                    /** @var Filter $this */
//
//                    $name = $this->getName();
//
//                    $this->label(__("$path.$labelKey.$name"));
//
//                    break;
//
//                default:
//                    break;
//            }

            return $this;
        };
    }
}
