<?php

function WWS_custom_fullscreeneditor_logo(){
    $screen = get_current_screen();
    if( ! $screen->is_block_editor ) {
        return;
    }

    //custom GB full screen Logo
    echo '<style>
        body.is-fullscreen-mode .edit-post-header a.components-button.has-icon svg{
            display: none;
        }
        /* adds a custom image */
        body.is-fullscreen-mode .edit-post-header a.components-button.has-icon:before{
            background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/custom-logo.png);
            background-size: contain;
            /* you can the image paddings with the parameters below*/
            top: 10px;
            right: 10px;
            bottom: 10px;
            left: 10px;
        }     
    </style>';

    //basic helpers
    echo '<style>
        .wp-block.wp-block:not(.editor-post-title):not(.block-list-appender):not(.block-editor-default-block-appender):not([data-type="generateblocks/grid"]){
            margin-top: 24px; margin-bottom: 24px; padding: 8px;
            border: dashed 1px #00000024;
        }
            .wp-block.wp-block:not(.editor-post-title):not(.block-list-appender):not(.block-editor-default-block-appender):not([data-type="generateblocks/grid"]):hover{
                border: solid 1px #00000088;
            }
        .wp-block-separator{
            background-color: #417BC7;
            width: 100% !important;
        }
        .wp-block-group, .wp-block-buttons{
            padding: 8px;
        }
        /* add color to spacers */
        .wp-block-spacer{
            background: rgba(211, 211, 211, 0.3);
        }
    </style>';

    //HIDE unwanted gb Sidebar Settings
    echo '<style>
        .components-panel .typography-block-support-panel{
            display:none;
        }
        .components-toolbar-group button[aria-label="Allinea"]{
            display:none;
        }
        .components-panel .block-editor-hooks__flex-layout-justification-controls{
            display:none;
        }
            .components-panel .block-editor-hooks__flex-layout-orientation-controls{
                display:none;
            }
            .components-toolbar-group button[aria-label="Change items justification"], .components-button[aria-label="Align"]{
                display:none;
            }
            .block-editor-hooks__border-controls{
                display:none;
            }
            .components-panel .components-button-group[aria-label="Button width"]{
                display:none;
            } 
    </style>';

    //HIDE unwanted options on wysiwyg visual editor
    echo '<style>
        .cf-rich-text .cf-field__body .wp-media-buttons{ /*media-buttons*/
            display:none;
        }
        .cf-rich-text .cf-field__body .wp-editor-container .mce-btn.mce-listbox{ /*paragraph*/
            display:none;
        }
        .cf-rich-text .cf-field__body .wp-editor-container .mce-btn:nth-of-type(6){ /*quote*/
            display:none;
        }
        .cf-rich-text .cf-field__body .wp-editor-container .mce-btn:nth-of-type(7), .cf-rich-text .cf-field__body .wp-editor-container .mce-btn:nth-of-type(8), .cf-rich-text .cf-field__body .wp-editor-container .mce-btn:nth-of-type(9){ /*text align*/
            display:none;
        }
        .cf-rich-text .cf-field__body .wp-editor-container .mce-btn:nth-of-type(11), .cf-rich-text .cf-field__body .wp-editor-container .mce-btn:nth-of-type(12), .cf-rich-text .cf-field__body .wp-editor-container .mce-btn:nth-of-type(13){ /*strange stuff*/
            display:none;
        }
    </style>';
}
add_action( 'admin_head', 'WWS_custom_fullscreeneditor_logo' );


//disable gb Sidebar Settings
function WWS_disable_gutenberg_sidebar_settings() {
    //remove core patterns
    remove_theme_support("core-block-patterns");
    //hide Color
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'editor-color-palette' );
	add_theme_support( 'editor-gradient-presets', [] );
	add_theme_support( 'disable-custom-gradients' );
}
add_action( 'after_setup_theme', 'WWS_disable_gutenberg_sidebar_settings' );


// Remove block style pannel via JS
function enqueue_block_editor_scripts() {
    wp_enqueue_script(
        'gb-style-blocks-js',
        get_stylesheet_directory_uri() . '/js/gb-style-blocks.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), // specify dependencies to avoid race condition
        '1.0',
        true
    );
}
add_action('enqueue_block_editor_assets', 'enqueue_block_editor_scripts');

?>