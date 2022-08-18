<?php
get_header();
while (have_posts()) {
    the_post(); ?>
    <div class="container">

        <h2><?php the_title(); ?></h2>
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