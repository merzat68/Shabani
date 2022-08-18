<?php
get_header();
while (have_posts()) {
    the_post(); ?>
    <div class="container">
        <i class="bi bi-house"></i>
        <h2><?php the_title(); ?></h2>
        <div>
            <p>نوشته شده توسط
                <?php the_author_posts_link(); ?>
                در
                <?php the_time('n.j.y') ?>
                و مجموعه
                <?php echo get_the_category_list(', ') ?>
            </p>
        </div>
        <?php the_content(); ?>
    </div>
<?php }
get_footer();
?>