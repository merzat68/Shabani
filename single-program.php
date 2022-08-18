<?php
get_header();
while (have_posts()) {
    the_post(); ?>
    <div class="container mt-6">

        <p><a href="<?php echo get_post_type_archive_link('program') ?>"><i class="bi bi-house"></i></a></p>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>


        <?php
        $today = date('Y-m-d');
        $reMakeDate = '/([\x{06F0}-\x{06F9}]{4})([\x{06F0}-\x{06F9}]{2})([\x{06F0}-\x{06F9}]{2})/mu';
        $reEventdate = '/\-/mu';
        $subst = '';
        $latestNewsEvents = new WP_Query(array(
            'posts_per_page' => 4,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'meta_type'     => 'DATE',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'DATE'
                ),
                array(
                    'key' => 'related_courses',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"'
                )
            )
        ));
        if ($latestNewsEvents->have_posts()) {
            echo '<hr class="border border-primary border-1 opacity-25">';
            echo '<h2 class="h2">رویداد های ' . get_the_title() . ' پیش رو</h2><br>';
        ?>
            <div class="d-flex <?php echo $latestNewsEvents->max_num_pages >= 4 ? $justifyContentBetween : ''; ?> mt-4">
            <?php
            while ($latestNewsEvents->have_posts()) {
                $latestNewsEvents->the_post();
                get_template_part('/template-parts/content', 'event');
            }
        }
        wp_reset_postdata();
            ?>
            </div>

            <?php
            $today = date('Y-m-d');
            $reMakeDate = '/([\x{06F0}-\x{06F9}]{4})([\x{06F0}-\x{06F9}]{2})([\x{06F0}-\x{06F9}]{2})/mu';
            $reEventdate = '/\-/mu';
            $subst = '';
            $relatedProfessors = new WP_Query(array(
                'posts_per_page' => -1,
                'post_type' => 'professor',
                'orderby' => 'title',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'related_courses',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                    )
                )
            ));
            if ($relatedProfessors->have_posts()) {
                echo '<hr class="border border-primary border-1 opacity-25">';
                echo '<h2 class="h2">اساتید ' . get_the_title() . '</h2><br>';
            ?>
                <div class="d-flex <?php echo $relatedProfessors->max_num_pages >= 4 ? $justifyContentBetween : ''; ?> mt-4">
                    <?php
                    while ($relatedProfessors->have_posts()) {
                        $relatedProfessors->the_post();
                    ?>
                        <figure class="professor__figure--cards">
                            <a href="<?php the_permalink(); ?>" target="_blank">
                                <div class="image-professor">
                                    <?php the_post_thumbnail('professorImage') ?>
                                </div>
                            </a>
                            <div class="caption">
                                <figcaption>
                                    <h5 class="h5 fw-bolder"> <?php the_title(); ?></h5>
                                </figcaption>
                                <footer>
                                    <div class="views"><i class="bi bi-eye-fill"></i>928</div>
                                    <div class="love"><i class="bi bi-heart-fill"></i>198</div>
                                    <div class="comments"><i class="bi bi-chat-left-text-fill"></i>23</div>
                                </footer>
                            </div>

                        </figure>
                <?php
                    }
                }
                wp_reset_postdata();
                ?>
                </div>
    </div>

<?php }
get_footer();
?>