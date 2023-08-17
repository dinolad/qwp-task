<?php
/*
Plugin Name: Q Task Movies
Description: Custom post type for movies.
Version: 1.0
*/

//__________________________
// Register Custom Post Type
function custom_post_type_movies() {
    $labels = array(
        'name' => __( 'Movies' ),
        'singular_name' => __( 'Movie' )
    );
    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'show_in_menu'  => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-video-alt2', // You can use other dashicons or a URL to a custom icon
        'can_export'    => true,
        'has_archive'   => true,
        'rewrite'       => array( 'slug' => 'movies' ),
        'show_in_rest'  => true, // Enable REST API support
    );
    register_post_type( 'movies', $args );
}
add_action('init', 'custom_post_type_movies');

//_______________________________________________________
// Add a custom meta box to the "Movies" custom post type
function add_movie_title_meta_box() {
    add_meta_box(
        'movie-title', // Unique ID
        'Movie Title', // Box title
        'display_movie_title_meta_box', // Callback function to display the box content
        'movies', // Post type where the box should appear
        'normal', // Priority
        'high' // Position
    );
}
add_action('add_meta_boxes', 'add_movie_title_meta_box');

// Callback function to display the meta box content
function display_movie_title_meta_box($post) {
    $movie_title = get_post_meta($post->ID, '_movie_title', true);
    ?>
    <label for="movie-title">Movie Title:</label>
    <input type="text" id="movie-title" name="movie_title" value="<?php echo esc_attr($movie_title); ?>" />
    <?php
}

// Save the custom meta field data
function save_movie_title_meta($post_id) {
    if (isset($_POST['movie_title'])) {
        update_post_meta($post_id, '_movie_title', sanitize_text_field($_POST['movie_title']));
    }
}
add_action('save_post_movies', 'save_movie_title_meta');

// Enqueue the custom CSS file
function enqueue_custom_styles() {
    wp_enqueue_style('movies-styles', plugin_dir_url(__FILE__) . 'css/style.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
