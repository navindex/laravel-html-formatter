<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Safety switch
    |--------------------------------------------------------------------------
    |
    | Formatting the HTML output is always risky. It can cause unforseen data
    | loss. With the safety switch set to TRUE, the 'action' setting will be
    | ignored in PRODUCTION environment and no formatting will be applied.
    |
    */

    'safety' => true,

    /*
    |--------------------------------------------------------------------------
    | Action
    |--------------------------------------------------------------------------
    |
    | This value identifies what to do with the HTML response.
    | Valid options are null, 'minify' and 'beautify'.
    | In PRODUCTION environment, this value will be evaluated only if the
    | 'safety' is set to FALSE.
    |
    */

    'action' => 'beautify',

    /*
    |--------------------------------------------------------------------------
    | Indentation string
    |--------------------------------------------------------------------------
    |
    | This string will be used as indentation character.
    |
    */

    'tab' => '    ',

    /*
    |--------------------------------------------------------------------------
    | Newline character
    |--------------------------------------------------------------------------
    |
    | Set this to an emty string for minify, "\n" for beautify
    |
    */

    'line-break' => PHP_EOL,

    /*
    |--------------------------------------------------------------------------
    | Empty tags
    |--------------------------------------------------------------------------
    |
    | Here you can add more self-closing tags.
    |
    */

    'self-closing'  => [
        'tag' => [
            'area', 'base', 'br', 'col', 'command', 'embed', 'hr', 'img', 'input',
            'keygen', 'link', 'menuitem', 'meta', 'param', 'source', 'track', 'wbr',
            'animate', 'stop', 'path', 'circle', 'line', 'polyline', 'rect', 'use',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Inline tags
    |--------------------------------------------------------------------------
    |
    | Here you can add more inline tags,
    | or change any block tags and make them inline.
    |
    */

    'inline' => [
        'tag' => [
            'a', 'abbr', 'acronym', 'b', 'bdo', 'big', 'br', 'button', 'cite', 'code', 'dfn', 'em',
            'i', 'img', 'kbd', 'label', 'samp', 'small', 'span', 'strong', 'sub', 'sup', 'tt', 'var',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Formatted tags
    |--------------------------------------------------------------------------
    |
    | Here you can add more preformatted tags,
    | or change settings induvudually for each tag.
    |
    */

    'formatted' => [
        'tag' => [
            'script' => [
                'closing-break' => true,
                'trim' => true
            ],
            'pre' => [],
            'textarea' => [],
        ],
        'cleanup-empty' => true,
        'opening-break' => true,
        'closing-break' => false,
        'trim' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Attribute settings
    |--------------------------------------------------------------------------
    |
    | If 'trim' is TRUE, leading and trailing whitespace will be removed
    | in the attribute values.
    | If 'cleanup' is TRUE, all whitespaces will be replaced with a single space
    | in the attribute values.
    |
    */

    'attributes' => [
        'trim' => true,
        'cleanup' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | CDATA settings
    |--------------------------------------------------------------------------
    |
    | If 'trim' is TRUE, leading and trailing whitespace will be removed
    | in the attribute values.
    | If 'cleanup' is TRUE, all whitespaces will be replaced with a single space
    | in the attribute values.
    |
    */

    'cdata' => [
        'trim' => true,
        'cleanup' => true,
    ],
];
