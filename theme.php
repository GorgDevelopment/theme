<?php

return [
    'name' => 'Nebula',
    'author' => 'Cirrixo',
    'url' => 'https://cirrixo.com',

    'settings' => [
        [
            'name' => 'direct_checkout',
            'label' => 'Direct Checkout',
            'type' => 'checkbox',
            'default' => false,
            'description' => 'Don\'t show the product overview page, go directly to the checkout page',
        ],
        [
            'name' => 'home_page_text',
            'label' => 'Home Page Text',
            'type' => 'markdown',
            'default' => 'Welcome to Cirrixo!',
        ],
        // Light Theme Colors
        [
            'name' => 'primary',
            'label' => 'Primary Brand Color (Light)',
            'type' => 'color',
            'default' => 'hsl(262, 83%, 58%)', // Rich Purple
        ],
        [
            'name' => 'secondary',
            'label' => 'Secondary Brand Color (Light)',
            'type' => 'color',
            'default' => 'hsl(199, 89%, 48%)', // Vibrant Blue
        ],
        [
            'name' => 'accent',
            'label' => 'Accent Color (Light)',
            'type' => 'color',
            'default' => 'hsl(330, 82%, 60%)', // Bright Pink
        ],
        [
            'name' => 'neutral',
            'label' => 'Borders, Accents (Light)',
            'type' => 'color',
            'default' => 'hsl(220, 16%, 92%)',
        ],
        [
            'name' => 'base',
            'label' => 'Base Text Color (Light)',
            'type' => 'color',
            'default' => 'hsl(225, 25%, 20%)',
        ],
        [
            'name' => 'muted',
            'label' => 'Muted Text Color (Light)',
            'type' => 'color',
            'default' => 'hsl(225, 15%, 50%)',
        ],
        [
            'name' => 'inverted',
            'label' => 'Inverted Text Color (Light)',
            'type' => 'color',
            'default' => 'hsl(0, 0%, 100%)',
        ],
        [
            'name' => 'background',
            'label' => 'Background Color (Light)',
            'type' => 'color',
            'default' => 'hsl(220, 25%, 98%)',
        ],
        [
            'name' => 'background-secondary',
            'label' => 'Background Secondary (Light)',
            'type' => 'color',
            'default' => 'hsl(220, 25%, 95%)',
        ],
        // Dark Theme Colors
        [
            'name' => 'dark-primary',
            'label' => 'Primary Brand Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(262, 83%, 65%)', // Brighter Purple
        ],
        [
            'name' => 'dark-secondary',
            'label' => 'Secondary Brand Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(199, 89%, 55%)', // Brighter Blue
        ],
        [
            'name' => 'dark-accent',
            'label' => 'Accent Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(330, 82%, 65%)', // Brighter Pink
        ],
        [
            'name' => 'dark-neutral',
            'label' => 'Borders, Accents (Dark)',
            'type' => 'color',
            'default' => 'hsl(225, 20%, 25%)',
        ],
        [
            'name' => 'dark-base',
            'label' => 'Base Text Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(220, 25%, 95%)',
        ],
        [
            'name' => 'dark-muted',
            'label' => 'Muted Text Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(220, 15%, 65%)',
        ],
        [
            'name' => 'dark-inverted',
            'label' => 'Inverted Text Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(225, 25%, 20%)',
        ],
        [
            'name' => 'dark-background',
            'label' => 'Background Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(225, 30%, 12%)',
        ],
        [
            'name' => 'dark-background-secondary',
            'label' => 'Background Secondary (Dark)',
            'type' => 'color',
            'default' => 'hsl(225, 28%, 15%)',
        ],
        // Status Colors
        [
            'name' => 'success',
            'label' => 'Success Color',
            'type' => 'color',
            'default' => 'hsl(142, 76%, 36%)',
        ],
        [
            'name' => 'error',
            'label' => 'Error Color',
            'type' => 'color',
            'default' => 'hsl(346, 87%, 43%)',
        ],
        [
            'name' => 'warning',
            'label' => 'Warning Color',
            'type' => 'color',
            'default' => 'hsl(32, 95%, 44%)',
        ],
        [
            'name' => 'info',
            'label' => 'Info Color',
            'type' => 'color',
            'default' => 'hsl(199, 89%, 48%)',
        ],
        [
            'name' => 'inactive',
            'label' => 'Inactive Color',
            'type' => 'color',
            'default' => 'hsl(220, 15%, 60%)',
        ],
    ],
];
