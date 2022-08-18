<?php
get_header();
while (have_posts()) {
    the_post(); ?>
    <div class="container">

        <p><a href="<?php echo get_post_type_archive_link('event') ?>"><i class="bi bi-house"></i></a></p>
        <h2><?php the_title(); ?></h2>
        <div>
            <p>نوشته شده توسط
                <?php the_author_posts_link(); ?>
                در
                <?php the_time('Y/n/j') ?>
            </p>
        </div>
        <div> <?php the_content(); ?> </div>
        <ul class="list-group list-group-flush">
            <?php
            $relatedPrograms = get_field('related_courses');
            if ($relatedPrograms) {
                foreach ($relatedPrograms as $program) { ?>
                    <li class="list-group-item"><a href="<?php echo get_the_permalink($program) ?>"><?php echo get_the_title($program); ?></a></li>
                <?php } ?>
        </ul>
    <?php } ?>
    </div>
<?php }
get_footer();
?>