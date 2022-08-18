<?php get_header(); ?>

<div class="container d-flex flex-column">
    <?php if (is_category()) {
        single_cat_title();
    }
    if (is_author()) {
        echo 'ارسال شده توسط ';
        the_author();
    } ?>
    <?php the_archive_description();  ?>
    <div class="d-flex justify-content-center mt-5">
        <?php
        $today = jdate('Ymd');
        while (have_posts()) {
            the_post();
            get_template_part('/template-parts/content', 'event');
        } ?>
    </div>
    <div class="d-flex justify-content-center my-5">
        <?php
        echo paginate_links(
            array(
                'prev_text' => 'قبلی',
                'next_text' => 'بعدی',
            )
        );
        ?>
    </div>
</div>

<?php
get_footer();
?>