<?php
/**
 * Ikonic Solution functions and definitions
 * @package Ikonic Sloution
 * @since Ikonic Sloution 1.0
 */
if ( ! function_exists( 'Ikonicsolution_block_styles' ) ) :
	function Ikonicsolution_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'Ikonicsolution' ),
				
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'Ikonicsolution' ),
				
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'Ikonicsolution' ),
				
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'Ikonicsolution' ),
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'Ikonicsolution' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'Ikonicsolution_block_styles' );

if ( ! function_exists( 'Ikonicsolution_block_stylesheets' ) ) :
	function Ikonicsolution_block_stylesheets() {
		
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'Ikonicsolution-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'Ikonicsolution_block_stylesheets' );

/**
 * Register pattern categories.
 */

if ( ! function_exists( 'Ikonicsolution_pattern_categories' ) ) :

	function Ikonicsolution_pattern_categories() {

		register_block_pattern_category(
			'page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category' ),
				'description' => __( 'A collection of full page layouts.' ),
			)
		);
	}
endif;

add_action( 'init', 'Ikonicsolution_pattern_categories' );




function your_theme_customizer_options( $wp_customize ) {

    // Header Section
    $wp_customize->add_section( 'header_section', array(
        'title'    => __( 'Header', 'your-theme' ),
        'priority' => 30,
    ) );

    // Add Header Background Color
    $wp_customize->add_setting( 'header_background_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
        'label'    => __( 'Header Background Color', 'your-theme' ),
        'section'  => 'header_section',
        'settings' => 'header_background_color',
    ) ) );

    // Typography Section
    $wp_customize->add_section( 'typography_section', array(
        'title'    => __( 'Typography', 'your-theme' ),
        'priority' => 35,
    ) );

    // Add Font Size Setting
    $wp_customize->add_setting( 'font_size', array(
        'default'           => '16px',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'font_size', array(
        'label'    => __( 'Font Size', 'your-theme' ),
        'section'  => 'typography_section',
        'settings' => 'font_size',
        'type'     => 'text',
    ) );

    // Colors Section
    $wp_customize->add_section( 'colors_section', array(
        'title'    => __( 'Colors', 'your-theme' ),
        'priority' => 40,
    ) );

    // Add Primary Color Setting
    $wp_customize->add_setting( 'primary_color', array(
        'default'           => '#3498db',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'label'    => __( 'Primary Color', 'your-theme' ),
        'section'  => 'colors_section',
        'settings' => 'primary_color',
    ) ) );

    // Layout Section
    $wp_customize->add_section( 'layout_section', array(
        'title'    => __( 'Layout', 'your-theme' ),
        'priority' => 50,
    ) );

    // Add Layout Option Setting
    $wp_customize->add_setting( 'layout_option', array(
        'default'           => 'full-width',
        'sanitize_callback' => 'your_theme_sanitize_layout_option',
    ) );

    $wp_customize->add_control( 'layout_option', array(
        'label'    => __( 'Layout Option', 'your-theme' ),
        'section'  => 'layout_section',
        'settings' => 'layout_option',
        'type'     => 'select',
        'choices'  => array(
            'full-width' => __( 'Full Width', 'your-theme' ),
            'boxed'      => __( 'Boxed', 'your-theme' ),
        ),
    ) );

   

}

add_action( 'customize_register', 'your_theme_customizer_options' );




// Custom sanitize function for layout option
function your_theme_sanitize_layout_option( $input ) {
    return in_array( $input, array( 'full-width', 'boxed' ) ) ? $input : 'full-width';
}



//3. Write a function that will redirect the user away from 
//   the site if their IP address starts with 77.29. 
//   Use WordPress native hooks and APIs to handle this.

function redirect_users_by_ip() {
    // Get the user's IP address
    $user_ip = $_SERVER['REMOTE_ADDR'];

    // Check if the IP address starts with "77.29"
    if (strpos($user_ip, '77.29') === 0) {
        // Redirect the user to a different URL
        wp_redirect('https://ikonicsolution.com/'); 
        exit();
    }
}

add_action('wp', 'redirect_users_by_ip');


//4.  Register post type called "Projects" 
//    and a taxonomy "Project Type" for this post type.

function register_custom_post_type() {
    // Register Custom Post Type
    register_post_type('project',
        array(
            'labels' => array(
                'name' => __('Projects'),
                'singular_name' => __('Project'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'projects'),
        )
    );

    // Register Custom Taxonomy
    register_taxonomy('project_type', 'project',
        array(
            'label' => __('Project Type'),
            'hierarchical' => true,
            'rewrite' => array('slug' => 'project-type'),
        )
    );
}
add_action('init', 'register_custom_post_type');


//5.      Point No 5 Is on Archieve-project.php

//6.      Create an Ajax endpoint that will output 
//        the last three published "Projects" that 
//        belong in the "Project Type" called "Architecture" 
//        If the user is not logged in. If the user is logged In it 
//        should return the last six published "Projects" in the project type call. 
//        "Architecture". Results should be returned in the following JSON format 
//        {success: true, data: [{object}, {object}, {object}, {object}, {object}]}. 
//        The object should contain three properties (id, title, link).


function get_architecture_projects() {
    $response = array();

    // Check if the user is logged in
    if (is_user_logged_in()) {
        $posts_per_page = 6;
    } else {
        $posts_per_page = 3;
    }

    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => $posts_per_page,
        'tax_query'      => array(
            array(
                'taxonomy' => 'project_type',
                'field'    => 'slug',
                'terms'    => 'architecture',
            ),
        ),
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $projects = array();

        while ($query->have_posts()) {
            $query->the_post();

            $project_data = array(
                'id'    => get_the_ID(),
                'title' => get_the_title(),
                'link'  => get_permalink(),
            );

            $projects[] = $project_data;
        }

        $response['success'] = true;
        $response['data']    = $projects;
    } else {
        $response['success'] = false;
        $response['data']    = array();
    }

    wp_reset_postdata();

    wp_send_json($response);
}
add_action('wp_ajax_nopriv_get_architecture_projects', 'get_architecture_projects');
add_action('wp_ajax_get_architecture_projects', 'get_architecture_projects');






function enqueue_custom_scripts() {
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/custom-scripts.js', array('jquery'), null, true);

    // Pass Ajax URL to script.js
    wp_localize_script('custom-scripts', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');



//7.  Use the WordPress HTTP API to create a function 
//    called hs_give_me_coffee() that will return a direct 
//    link to a cup of coffee. for us using the Random Coffee API [JSON].

function hs_give_me_coffee() {
    $coffee_api_url = 'https://coffee.alexflipnote.dev/random.json';

    // Make a request to the Coffee API
    $response = wp_remote_get($coffee_api_url);

    // Check if the request was successful
    if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
        // Decode the JSON response
        $coffee_data = json_decode(wp_remote_retrieve_body($response), true);

        // Check if the required data is present
        if (isset($coffee_data['file'])) {
            return esc_url($coffee_data['file']);
        }
    }

    // Return a default link or handle the error as needed
    return 'https://example.com/default-coffee-image.jpg';
}



  
//8.      Use this API https://api.kanye.rest/ 
//        and show 5 quotes on a page.

function display_kanye_quotes() {
    $kanye_api_url = 'https://api.kanye.rest/quotes?count=5';

    $response = wp_remote_get($kanye_api_url);

    if (is_array($response) && !is_wp_error($response)) {
        $quotes_data = json_decode(wp_remote_retrieve_body($response), true);

        if (is_array($quotes_data)) {
            echo '<ul>';
            foreach ($quotes_data as $quote) {
                echo '<li>' . esc_html($quote) . '</li>';
            }
            echo '</ul>';
        }
    }
}

// Check if it's the front end
if (!is_admin()) {
    // Call the coffee function
    $coffee_url = hs_give_me_coffee();

    // Output the coffee image
    if (!empty($coffee_url)) {
        echo '<img src="' . esc_url($coffee_url) . '" alt="Coffee Image">';
    }

    // Call the Kanye quotes function
    display_kanye_quotes();
}
