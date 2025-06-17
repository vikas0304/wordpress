<?php
/**
 * Twenty Twenty-Five Child Theme functions and definitions
 *
 * @package Twenty Twenty-Five Child
 */

/**
 * Enqueue scripts and styles.
 */
function twentytwentyfive_child_enqueue_styles() {
    // Enqueue parent theme's stylesheet.
    wp_enqueue_style(
        'twentytwentyfive-parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // Enqueue Bootstrap 5 CSS from a CDN.
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        array(),
        '5.3.3'
    );

    // Enqueue Google Fonts: Raleway.
    wp_enqueue_style(
        'google-fonts-raleway',
        'https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap',
        array(),
        null
    );

    // Enqueue Font Awesome for icons from a CDN.
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
        array(),
        '6.5.2'
    );

    // Enqueue your child theme's stylesheet. IMPORTANT: This should be last.
    wp_enqueue_style(
        'twentytwentyfive-child-style',
        get_stylesheet_uri(),
        array( 'twentytwentyfive-parent-style', 'bootstrap-css' ), // Dependencies
        wp_get_theme()->get('Version')
    );

    // Enqueue Bootstrap 5 JS Bundle (includes Popper.js).
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        array(), // No dependencies for this script
        '5.3.3',
        true // Load in the footer
    );

     wp_enqueue_script(
        'testimonial-slider',
        get_stylesheet_directory_uri() . '/js/testimonial-slider.js',
        array(),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_styles' );

function create_testimonial_post_type() {
    $labels = array(
        'name'                  => _x( 'Testimonials', 'Post Type General Name', 'twentytwentyfive-child' ),
        'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'twentytwentyfive-child' ),
        'menu_name'             => __( 'Testimonials', 'twentytwentyfive-child' ),
        'name_admin_bar'        => __( 'Testimonial', 'twentytwentyfive-child' ),
        'archives'              => __( 'Testimonial Archives', 'twentytwentyfive-child' ),
        'attributes'            => __( 'Testimonial Attributes', 'twentytwentyfive-child' ),
        'parent_item_colon'     => __( 'Parent Testimonial:', 'twentytwentyfive-child' ),
        'all_items'             => __( 'All Testimonials', 'twentytwentyfive-child' ),
        'add_new_item'          => __( 'Add New Testimonial', 'twentytwentyfive-child' ),
        'add_new'               => __( 'Add New', 'twentytwentyfive-child' ),
        'new_item'              => __( 'New Testimonial', 'twentytwentyfive-child' ),
        'edit_item'             => __( 'Edit Testimonial', 'twentytwentyfive-child' ),
        'update_item'           => __( 'Update Testimonial', 'twentytwentyfive-child' ),
        'view_item'             => __( 'View Testimonial', 'twentytwentyfive-child' ),
        'view_items'            => __( 'View Testimonials', 'twentytwentyfive-child' ),
        'search_items'          => __( 'Search Testimonial', 'twentytwentyfive-child' ),
    );
    $args = array(
        'label'                 => __( 'Testimonial', 'twentytwentyfive-child' ),
        'description'           => __( 'Client or customer testimonials', 'twentytwentyfive-child' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-format-quote',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'testimonial', $args );
}
add_action( 'init', 'create_testimonial_post_type', 0 );

function testimonial_author_meta_box() {
    add_meta_box(
        'testimonial_author',
        __( 'Testimonial Author', 'twentytwentyfive-child' ),
        'testimonial_author_meta_box_html',
        'testimonial' // The CPT slug
    );
}
add_action( 'add_meta_boxes', 'testimonial_author_meta_box' );

function testimonial_author_meta_box_html( $post ) {
    $value = get_post_meta( $post->ID, '_testimonial_author_name', true );
    wp_nonce_field( 'testimonial_author_nonce', 'author_nonce' ); // Security Nonce
    ?>
    <label for="testimonial_author_name"><?php _e( 'Author\'s Name:', 'twentytwentyfive-child' ); ?></label>
    <input type="text" id="testimonial_author_name" name="testimonial_author_name" value="<?php echo esc_attr( $value ); ?>" class="widefat">
    <?php
}

function testimonial_save_author_name( $post_id ) {
    // Check nonce for security
    if ( ! isset( $_POST['author_nonce'] ) || ! wp_verify_nonce( $_POST['author_nonce'], 'testimonial_author_nonce' ) ) {
        return;
    }
    // Check if the user has permissions
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    // Save the data
    if ( isset( $_POST['testimonial_author_name'] ) ) {
        update_post_meta( $post_id, '_testimonial_author_name', sanitize_text_field( $_POST['testimonial_author_name'] ) );
    }
}
add_action( 'save_post', 'testimonial_save_author_name' );