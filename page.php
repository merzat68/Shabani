<?php
get_header();
while (have_posts()) {
    the_post(); ?>

    <div class="container">
        <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>)"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php the_title(); ?></h1>
            </div>
        </div>

        <div class="container container--narrow page-section">
            <?php
            $theParentId = wp_get_post_parent_id(get_the_ID());
            if ($theParentId) {
            ?>
                <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                        <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParentId) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParentId) ?></a> <span class="metabox__main"><?php the_title(); ?></span>
                    </p>
                </div>
            <?php } ?>

            <?php
            $checkHasChild = get_pages(array(
                'child_of' => get_the_ID()
            ));
            if ($checkHasChild || $theParentId) {
            ?>
                <div class="page-links">
                    <h2 class="page-links__title"><a href="<?php echo get_permalink($theParentId) ?>"><?php echo get_the_title($theParentId) ?></a></h2>
                    <ul class="min-list">
                        <?php
                        if ($theParentId) {
                            $childrenOf = $theParentId;
                        } else {
                            $childrenOf = get_the_ID();
                        }
                        wp_list_pages(array(
                            'title_li' => null,
                            'child_of' => $childrenOf,
                            'sort_column' => 'menu_order'
                        ));
                        ?>
                    </ul>
                </div>
            <?php } ?>
            <div class="generic-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

<?php }
get_footer();
?>