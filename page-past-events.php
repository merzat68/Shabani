<?php

use function PHPSTORM_META\type;

get_header(); ?>

<div class="container">
    <?php
    $today = date("Y-m-d");
    $pastEvents = new WP_Query(array(
        'paged'         => get_query_var('paged', 1),
        'post_type'     => 'event',
        'meta_key'      => 'event_date',
        'meta_type'     => 'DATE',
        'orderby'       => 'meta_value',
        'order'         => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '<',
                'value' => $today,
                'type' => 'DATE'
            )
        )
    ));
    while ($pastEvents->have_posts()) {
        $pastEvents->the_post();
        get_template_part('/template-parts/content', 'event');
    }
    echo paginate_links(array(
        'total' => $pastEvents->max_num_pages
    ));
    ?>
</div>

<?php
get_footer();
?>