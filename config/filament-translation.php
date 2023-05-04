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
    | Common translations
    |--------------------------------------------------------------------------
    |
    |
    |
    */
    'common' => [
        'is_using' => true,

        'path' => 'filament/common',

        'attribute_key' => 'common',

        'placeholder_key' => 'placeholder',

        'attributes' => [
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ],

    'page' => [
        'list' => 'label.main',
        'create' => 'label.create',
        'edit' => 'label.edit',
        'view' => 'label.view',
    ],
];
