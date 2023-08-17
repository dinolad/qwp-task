<?php if (have_comments()) : ?>
    <h3><?php comments_number(); ?></h3>
    <ol class="comment-list">
        <?php wp_list_comments(); ?>
    </ol>
<?php endif; ?>
<?php comment_form(); ?>
