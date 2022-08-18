<?php get_header(); ?>

<div class="container">
    <?php if (is_category()) {
        single_cat_title();
    }
    if (is_author()) {
        echo 'ارسال شده توسط ';
        the_author();
    } ?>
    <?php the_archive_description();  ?>
    <?php
    while (have_posts()) {
        the_post(); ?>
        <div>
            <h2 class="h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>

        <div>
            <p>نوشته شده توسط
                <?php the_author_posts_link(); ?>
                در
                <?php the_time('n.j.y') ?>
                و مجموعه
                <?php echo get_the_category_list(', ') ?>
            </p>
        </div>

        <div>
            <?php the_excerpt(); ?>
            <p><a href="<?php the_permalink(); ?>">ادامه مطلب &raquo;</a></p>
        </div>
    <?php
    }
    echo paginate_links();
    ?>
</div>

<?php
get_footer();
?>