# Filament Translation

## Installation

Install package with composer:

```shell
composer require kpebedko22/filament-translation
```

Publish config:

```shell
php artisan vendor:publish --tag=filament-translation-config
```

## Usage

Main purpose is using in filament resources and relation managers. To avoid duplicating of calling `label`
and `placeholder` methods with passing similar parameters.

```php
TextInput::make('title')
    ->label(__('filament/resource/example.common.title'))
    ->placeholder(__('filament/resource/example.placeholder.title')),
```

### Filament Resource

```php
use Filament\Resources\Resource;
use Kpebedko22\FilamentTranslation\Traits\Translatable;

class ExampleResource extends Resource
{
    use Translatable;

    public static function translation(): FilamentTranslation
    {
        return FilamentTranslation::make(static::class, 'example');
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::trans([
                Forms\Components\TextInput::make('title'),
                Forms\Components\TextInput::make('slug'),
                Forms\Components\Textarea::make('description'),
            ]));
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns(self::trans([
                Tables\Columns\TextColumn::make('title'),
            ]))
            ->filters(self::trans([
                Tables\Filters\SelectFilter::make('author_id'),
            ]))
            ->actions([])
            ->bulkActions([]);
    }
}
```
