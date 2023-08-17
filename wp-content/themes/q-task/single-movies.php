<?php
/*
Template Name: Movies Single
Template Post Type: movies
*/

get_header();

while (have_posts()) : the_post();
    $movie_title = get_post_meta(get_the_ID(), '_movie_title', true);

    ?>
    <!-- Content section -->
    <section <?php post_class(); ?>>
        <article id="post-<?php the_ID(); ?>">
            <h1><?php the_title(); ?></h1>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    </section>

    <!-- Movie title section -->
    <section class="movie-title-section">
        <?php
        if (!empty($movie_title)) {
            echo "<p><strong>Movie Title:</strong> " . esc_html($movie_title) . "</p>";
        } else {
            echo "<p><strong>Movie Title:</strong> " . esc_html(get_the_title()) . "</p>";
        }
        ?>
    </section>

    <?php
endwhile;

get_footer();
