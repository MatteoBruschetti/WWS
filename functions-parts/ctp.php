<?php 
/*-------------------------------------------------
    ADD CUSTOM POST TYPE
--------------------------------------------------*/

    /*Replace = service-project*/

    function WWS_custom_service_project() {
        register_post_type('service-project',
            array(
                'labels'                =>          array(
                    'name'              =>          'Service Projects', //nome principale nella sidebar
                    'singular_name'     =>          'service project',
                    'all_items'         =>          'All', //nome link per visualizzare tutti i post
                    'add_new'           =>          'Add project', //nome link per aggiungere nuovo post
                    'add_new_item'      =>          'Add project', //titolo della pagina di aggiunta di un nuovo post
                    'edit_item'         =>          'Edit project', //titolo della pagina di aggiunta di un nuovo post
                    'new_item'          =>          'New project',
                    'view_item'         =>          'See project',
                    'search_items'      =>          'Search', //testo nel pulsante di ricerca
                    'not_found'         =>          'Nessun elemento trovato',
                    'not_found_in_trash'=>          'Nessun elemento nel cestino',
                    'parent_item_colon' =>          '',
                ),
                'description'           =>          'Good feedback that students leave',
                'public'                =>          true,
                'publicly_queryable'    =>          true,
                'exclude_from_search'   =>          false,
                'show_ui'               =>          true,
                'query_var'             =>          true,
                'menu_position'         =>          5,
                'menu_icon'             =>          'dashicons-clipboard', //Dashicon
                'rewrite'               =>          array(
                    'slug'              =>          'service-project',
                    'with-front'        =>          false,
                ),
                'has_archive'           =>          true,
                'capability_type'       =>          'post',
                'hierarchycal'          =>          false,
                'taxonomies'            =>          array(''),
                'show_in_rest'          =>          true, //gutemberg disattivato
                'supports'              =>          array('title', 'editor', 'thumbnail', 'excerpt') //campi supportati
            ), flush_rewrite_rules() /*fine delle opzioni*/
        );
    }
    add_action('init', 'WWS_custom_service_project');
    


    /*Replace = research-project*/

    function WWS_custom_research_project() {
        register_post_type('research-project',
            array(
                'labels'                =>          array(
                    'name'              =>          'Research Projects', //nome principale nella sidebar
                    'singular_name'     =>          'research project',
                    'all_items'         =>          'All', //nome link per visualizzare tutti i post
                    'add_new'           =>          'Add project', //nome link per aggiungere nuovo post
                    'add_new_item'      =>          'Add project', //titolo della pagina di aggiunta di un nuovo post
                    'edit_item'         =>          'Edit project', //titolo della pagina di aggiunta di un nuovo post
                    'new_item'          =>          'New project',
                    'view_item'         =>          'See project',
                    'search_items'      =>          'Search', //testo nel pulsante di ricerca
                    'not_found'         =>          'Nessun elemento trovato',
                    'not_found_in_trash'=>          'Nessun elemento nel cestino',
                    'parent_item_colon' =>          '',
                ),
                'description'           =>          'Good feedback that students leave',
                'public'                =>          true,
                'publicly_queryable'    =>          true,
                'exclude_from_search'   =>          false,
                'show_ui'               =>          true,
                'query_var'             =>          true,
                'menu_position'         =>          8,
                'menu_icon'             =>          'dashicons-search', //Dashicon
                'rewrite'               =>          array(
                    'slug'              =>          'research-project',
                    'with-front'        =>          false,
                ),
                'has_archive'           =>          true,
                'capability_type'       =>          'post',
                'hierarchycal'          =>          false,
                'taxonomies'            =>          array(''),
                'show_in_rest'          =>          false, //gutemberg disattivato
                'supports'              =>          array('title', 'thumbnail', 'excerpt') //campi supportati
            ), flush_rewrite_rules() /*fine delle opzioni*/
        );
    }
    add_action('init', 'WWS_custom_research_project');