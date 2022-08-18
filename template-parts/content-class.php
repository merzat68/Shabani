<?php
$re = '/\d+/m';
preg_match_all($re, tr_num(get_field('event_date')), $matches, PREG_SET_ORDER, 0);
$makeDate = jmktime(0, 0, 0, $matches[1][0], $matches[2][0], $matches[0][0]);
?>
<figure class="news__figure--cards">

    <div class="caption">
        <figcaption>
            <a class="w-75" href="<?php the_permalink(); ?>" target="_blank">
                <div class="image curtain">
                    <img src="<?php the_post_thumbnail_url(); ?>" /><i class=""><img class="nav__logo" src="<?php echo get_theme_file_uri('/Images/logo2.png'); ?>"></i>
                    <div class="date"><span class="day"><?php echo jdate('d', $makeDate); ?></span><span class="month"><?php echo jdate('F', $makeDate); ?></span></div>
                </div>
            </a>
            <h5 class="h5 fw-bolder"><a class="text-decoration-none" href="<?php the_permalink(); ?>" target="_blank">
                    <?php the_title(); ?>
                </a>
            </h5>
            <p><?php echo wp_trim_words(get_the_content(), 10); ?></p>
        </figcaption>
        <footer>
            <div class="views"><i class="bi bi-eye-fill"></i>928</div>
            <div class="love"><i class="bi bi-heart-fill"></i>198</div>
            <div class="comments"><i class="bi bi-chat-left-text-fill"></i>23</div>
        </footer>
    </div>

</figure>