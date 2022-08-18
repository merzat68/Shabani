<?php get_header(); ?>

<div class="container">
    <ul class="list-group">
        <?php
        while (have_posts()) {
            the_post();
        ?>
            <li class="list-group-item"><a class="text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php
        }
        echo paginate_links();
        ?>
    </ul>
</div>

<?php
get_footer();
?>