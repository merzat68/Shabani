<?php
get_header();
?>
<div class="container-fluid">
    <section class="container">
        <div class="tw-grid tw-grid-rows-2 tw-grid-cols-3 tw-gap-4">
            <div class="tw-row-span-2 tw-col-span-2 tw-bg-yellow-100 justify-content-between d-flex flex-row">
                <div class="d-flex flex-column tw-h-full justify-content-between">
                    <p class="h4 fw-bolder">سؤالات، پاسخنامه‌ها و تحلیل‌های کنکور ۱۴۰۱</p>
                    <a href="#" class="btn btn-primary">برای مشاهده کلیک کنید</a>
                </div>
                <div>
                    <img class=' tw-w-48' src="<?php echo get_theme_file_uri('/Images/IMG_8061.png'); ?>" alt="">
                </div>
            </div>
            <div class="tw-row-span-1 tw-col-span-1">
                <div class="tw-flex tw-flex-row justify-content-between">
                    <img class='tw-w-48' src="<?php echo get_theme_file_uri('/Images/IMG_8058.png'); ?>" alt="">
                    <div class="">
                        <p class="h4 fw-bolder">
                            آزمون الکترونیک
                        </p>
                        <div class="d-flex">
                            <div class="lh-base">
                                آزمون آنلاین در تمام دروس
                                <br>
                                دهم-یازدهم-دوازدهم
                                <br>
                                ریاضی-تجربی-انسانی
                            </div>

                            <div class="rounded-circle page-banner__button--read-more d-flex">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" strokeWidth="2" class="w-4 h-4">
                                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tw-flex tw-flex-row justify-content-between">
                <div class="classes__style d-flex position-relative p-3 align-items-center">
                    <img class='tw-w-48' src="<?php echo get_theme_file_uri('/Images/IMG_8057.png'); ?>" alt="">
                    <div class="d-flex flex-column mt-2 me-4">
                        <p class="h4 fw-bolder">
                            کلاس ها
                        </p>
                        <div class="d-flex rounded-2">
                            <div class="lh-base">
                                کلاس آنلاین در تمام دروس
                                <br>
                                دهم-یازدهم-دوازدهم
                                <br>
                                ریاضی-تجربی-انسانی

                            </div>

                            <div class="rounded-circle page-banner__button--read-more d-flex">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" strokeWidth="2" class="w-4 h-4">
                                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


















<div class="container-fluid section__style px-0">
    <section class="d-flex flex-column align-items-center container">
        <div class="page-banner container d-flex">

            <div class="d-flex flex-column flex-fill me-4 justify-content-between ">


            </div>
        </div>
    </section>

    <section class="container-fluid mt-6">
        <div class="container">
            <div class="full-width-split__one">
                <div class="d-flex justify-content-between align-items-center">

                    <div class=" grid grid-cols-4 border-bottom border-dark">
                        <h4 class="fw-bolder lh-lg my-0"> محصولات</h4>
                    </div>

                    <div class="d-flex products__slider--style align-items-center py-4 px-4">
                        <p class="h-4 fw-bolder my-0">پکیج</p>
                        <p class="h-4 fw-bolder my-0">آزمون</p>
                        <p class="h-4 fw-bolder my-0">کلاس</p>
                        <p class="h-4 fw-bolder my-0">جزوه</p>
                    </div>

                    <div class="">
                        <p class="btn btn-outline-primary py-3 my-0"><a href="#" class="text-decoration-none text-white">مشاهده همه</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid mt-6">
        <div class="container d-flex flex-column">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="border-bottom border-dark fw-bolder lh-lg">آخرین اخبار</h4>
                <a class="text-decoration-none" href="<?php echo site_url('/blog') ?>">مشاهده همه</a>
            </div>

            <?php
            $postCounter = 0;
            $latestNewsEvents = new WP_Query(array(
                'posts_per_page' => 4
            ));
            $postArgs = array(
                'post_type' => 'post'
            );
            $numberOfPosts = get_posts($postArgs);
            $justifyContentBetween = 'justify-content-between';
            ?>
            <div class="d-flex <?php echo count($numberOfPosts) >= 4 ? $justifyContentBetween : ''; ?> mt-4">
                <?php
                while ($latestNewsEvents->have_posts()) {
                    $latestNewsEvents->the_post(); ?>
                    <figure class="news__figure--cards">
                        <?php if (get_the_post_thumbnail()) { ?>
                            <a class="w-75" href="<?php the_permalink(); ?>" target="_blank">
                                <div class="image curtain">
                                    <img src="<?php echo the_post_thumbnail_url(); ?>" alt="sample74" /><i class=""><img class="nav__logo" src="<?php echo get_theme_file_uri('/Images/logo2.png'); ?>" alt=""></i>
                                    <div class="date"><span class="day"><?php echo tr_num(get_the_time('d'), 'fa'); ?></span><span class="month"><?php the_time('M') ?></span></div>
                                </div>
                            </a>
                        <?php } ?>
                        <div class="caption">
                            <figcaption>
                                <h5 class="read-more"><?php echo get_the_category_list(', '); ?></h5>
                                <h5 class="h5 fw-bolder"><a class="text-decoration-none" href="<?php the_permalink(); ?>" target="_blank">
                                        <?php the_title(); ?>
                                    </a>
                                </h5>
                                <p><?php if (has_excerpt()) {
                                        echo get_the_excerpt();
                                    } else {
                                        echo wp_trim_words(get_the_content(), 10);
                                    } ?>
                                </p>
                            </figcaption>
                            <footer>
                                <div class="views"><i class="bi bi-eye-fill"></i><?php echo tr_num(928, 'fa'); ?></div>
                                <div class="love"><i class="bi bi-heart-fill"></i><?php echo tr_num(198, 'fa'); ?></div>
                                <div class="comments"><i class="bi bi-chat-left-text-fill"></i><?php echo tr_num(28, 'fa'); ?></div>
                            </footer>
                        </div>

                    </figure>
                <?php
                }
                wp_reset_postdata();
                ?>
            </div>


    </section>

    <section class="container-fluid px-0">
        <div class="d-flex justify-content-between align-items-center container">
            <h4 class="border-bottom border-dark fw-bolder lh-lg">کلاس ها</h4>
        </div>

        <?php
        $today = date('Y-m-d');
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
                )
            )
        ));
        ?>
        <div class="d-flex justify-content-center mt-4 pt-5 courses__style">
            <?php
            while ($latestNewsEvents->have_posts()) {
                $latestNewsEvents->the_post();
                get_template_part('/template-parts/content', 'event');
            }
            wp_reset_postdata();
            ?>

        </div>
    </section>
    <section class="container" id="instagram__container">

    </section>
</div>

<?php
get_footer();
?>