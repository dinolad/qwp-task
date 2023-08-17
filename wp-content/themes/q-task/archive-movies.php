<?php
/*
Template Name: Movies Archive
*/
session_start();

// Check if user is logged in
if (!isset($_SESSION['token_key'])) {
    wp_redirect(home_url()); // Redirect to home if not logged in
    exit();
}

get_header();

?>

<main id="primary" class="site-main">
    <div id="content" role="main">

        <?php if (have_posts()) : ?>
            <header class="archive-header">
                <h1 class="archive-title"><?php post_type_archive_title(); ?></h1>
            </header>

            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>

            <?php the_posts_pagination(); ?>

        <?php else : ?>
            <p><?php _e('No movies found.'); ?></p>
        <?php endif; ?>

    </div>
</main>

<?php
get_footer();
?>