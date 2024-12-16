<?php
/**
 * Twenty Twenty-Five functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Twenty Twenty-Five 1.0
 */

// Adds theme support for post formats.
if ( ! function_exists( 'twentytwentyfive_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'twentytwentyfive_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_editor_style() {
		add_editor_style( get_parent_theme_file_uri( 'assets/css/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'twentytwentyfive_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_enqueue_styles() {
		wp_enqueue_style(
			'twentytwentyfive-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'twentytwentyfive_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfive' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'twentytwentyfive_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfive_page',
			array(
				'label'       => __( 'Pages', 'twentytwentyfive' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfive' ),
			)
		);

		register_block_pattern_category(
			'twentytwentyfive_post-format',
			array(
				'label'       => __( 'Post formats', 'twentytwentyfive' ),
				'description' => __( 'A collection of post format patterns.', 'twentytwentyfive' ),
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'twentytwentyfive_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_register_block_bindings() {
		register_block_bindings_source(
			'twentytwentyfive/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive' ),
				'get_value_callback' => 'twentytwentyfive_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'twentytwentyfive_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function twentytwentyfive_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;

function pneu4saison_setup() {
	// Ajouter le support des images à la une
	add_theme_support('post-thumbnails');
	
	// Enregistrer un menu personnalisé
	register_nav_menus(array(
		'primary' => 'Menu Principal',
		'footer' => 'Menu Pied de page'
	));
	
	// Ajouter un type de contenu personnalisé pour les pneus
	register_post_type('pneus', array(
		'labels' => array(
			'name' => 'Pneus',
			'singular_name' => 'Pneu'
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'menu_icon' => 'dashicons-cart'
	));
	
	// Ajouter une taxonomie pour les marques de pneus
	register_taxonomy('marque-pneu', 'pneus', array(
		'labels' => array(
			'name' => 'Marques',
			'singular_name' => 'Marque'
		),
		'hierarchical' => true,
		'public' => true
	));
}
add_action('after_setup_theme', 'pneu4saison_setup');

// Ajouter les styles personnalisés
function pneu4saison_enqueue_styles() {
	wp_enqueue_style('pneu4saison-style', get_stylesheet_uri());
	wp_enqueue_style('pneu4saison-custom', get_template_directory_uri() . '/assets/css/custom.css');
}
add_action('wp_enqueue_scripts', 'pneu4saison_enqueue_styles');

// Ajouter des champs personnalisés pour les pneus
function pneu4saison_add_tire_fields() {
    add_meta_box(
        'tire_details',
        'Détails du Pneu',
        'pneu4saison_tire_fields_callback',
        'pneus',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'pneu4saison_add_tire_fields');

function pneu4saison_tire_fields_callback($post) {
    $dimensions = get_post_meta($post->ID, '_tire_dimensions', true);
    $price = get_post_meta($post->ID, '_tire_price', true);
    $stock = get_post_meta($post->ID, '_tire_stock', true);
    
    ?>
    <div class="tire-fields">
        <p>
            <label for="tire_dimensions">Dimensions :</label>
            <input type="text" id="tire_dimensions" name="tire_dimensions" value="<?php echo esc_attr($dimensions); ?>">
        </p>
        <p>
            <label for="tire_price">Prix :</label>
            <input type="number" id="tire_price" name="tire_price" value="<?php echo esc_attr($price); ?>">
        </p>
        <p>
            <label for="tire_stock">Stock :</label>
            <input type="number" id="tire_stock" name="tire_stock" value="<?php echo esc_attr($stock); ?>">
        </p>
    </div>
    <?php
}

// Sauvegarder les champs personnalisés
function pneu4saison_save_tire_fields($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
    $fields = ['tire_dimensions', 'tire_price', 'tire_stock'];
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post_pneus', 'pneu4saison_save_tire_fields');
