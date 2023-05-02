<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Filament Translation Path
    |--------------------------------------------------------------------------
    |
    | The path in your lang/en/ folder.
    |
    */
    'path' => 'filament/resource/',

    'attribute_key' => 'common',

    'placeholder_key' => 'placeholder',

    /*
    |--------------------------------------------------------------------------
    | Use Translation Path
    |--------------------------------------------------------------------------
    |
    | If set to true, then by default each translation will start with 'path'.
    | Otherwise, each translation will be started from lang folder.
    |
    */
    'use_path' => true,

    /*
    |--------------------------------------------------------------------------
    | Common translations
    |--------------------------------------------------------------------------
    |
    |
    |
    */
    'common' => [
        'path' => 'filament/common',

        'attribute_key' => 'common',

        'placeholder_key' => 'placeholder',
    ],

    'page' => [
        'list' => 'label.main',
        'create' => 'label.create',
        'edit' => 'label.edit',
        'view' => 'label.view',
    ],
];
