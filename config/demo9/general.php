<?php
return array(
    // Assets
    'assets' => array(
        'favicon' => 'media/logos/favicon.ico',
        'fonts' => array(
            'google' => array(
                'Inter:300,400,500,600,700'
            )
        ),
        'css' => array(
            'plugins/global/plugins.bundle.css',
            'plugins/global/plugins-custom.bundle.css',
            'css/style.bundle.css',
        ),
        'js' => array(
            'plugins/global/plugins.bundle.js',
            'js/scripts.bundle.js',
            'js/custom/widgets.js',
        ),
    ),

    // Layout
    'layout' => array(
        // Main
        'main' => array(
            'type' => 'default', // Set layout type: default|blank|none
            'primary-color' => '#7239EA', // Primary color used in email templates
            'page-bg-white' => false, // Set true if page background color is white
        ),

        // Docs
        'docs' => array(
            'logo-path' => array(
                'default' => 'logos/default.svg',
                'dark' => 'logos/default-dark.svg'
            ),
            'logo-path-mobile' => array(
                'default' => 'logos/default-small.svg',
                'dark' => 'logos/default-small-dark.svg',
            ),
            'logo-class' => 'h-25px',
            'logo-class-mobile' => 'h-35px',
        ),

        // Illustration
        'illustrations' => array(
            'set' => 'sigma-1'
        ),

        // Loader
        'loader' => array(
            'display' => false,
            'type' => 'pinner-logo' // Set default|spinner-message|spinner-logo to hide or show page loader
        ),

        // Scrolltop
        'scrolltop' => array(
            'display' => true // Enable scrolltop
        ),

        // Header
        'header' => array(
            'display' => true, // Set true|false to show or hide Header
            'width' => 'fixed', // Set fixed|fluid to change width type
            'fixed' => array(
                'desktop' => true,  // Set true|false to set fixed Header for desktop mode
                'tablet-and-mobile' => true // Set true|false to set fixed Header for tablet and mobile modes
            ),
            'menu-icon' => 'svg', // Menu icon type(svg|font)
            'menu' => true
        ),

        // Page title
        'page-title' => array(
            'display' => true,
            'description' => false,
            'breadcrumb' => true
        ),

        // Toolbar
        'toolbar' => array(
            'display' => false,
        ),

        // Aside
        'aside' => array(
            'fixed' => true,
            'menu-icon' => 'svg', // Menu icon type(svg|font)
        ),

        // Content
        'content' => array(
            'width' => 'fixed', // Set fixed|fluid to change width type
            'layout' => 'default',  // Set content type,
        ),

        // Footer
        'footer' => array(
            'width' => 'fixed' // Set fixed|fluid to change width type
        )
    )
);
