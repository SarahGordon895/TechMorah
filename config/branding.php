<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Navbar / footer mark (your PNG may be icon + wordmark — see crop below)
    |--------------------------------------------------------------------------
    */

    'logo' => env('BRAND_LOGO', 'img/techmorah-icon.png'),

    /*
    |--------------------------------------------------------------------------
    | Clip bottom of logo image (hides “TechMorah / SOLUTION” under the icon)
    |--------------------------------------------------------------------------
    |
    | Percent of image height clipped from the bottom. Use 0 for a true icon-only
    | file (SVG/square mark). Default tuned for techmorah-icon.png layout.
    |
    */

    'logo_crop_bottom_percent' => (int) env('BRAND_LOGO_CROP_BOTTOM', 0),

    /*
    |--------------------------------------------------------------------------
    | Favicon — same mark as navbar for consistent branding
    |--------------------------------------------------------------------------
    */

    'favicon' => env('BRAND_FAVICON', 'img/techmorah-icon.png'),

    'show_wordmark' => env('BRAND_SHOW_WORDMARK', true),

];
