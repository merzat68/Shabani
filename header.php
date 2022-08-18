<?php

?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<?php if (!is_page(46)) { ?>

    <body class="main__style--all">
    <?php } else { ?>

        <body class="main__style--profile">
        <?php } ?>
        <nav class="navbar navbar-expand-lg header__border--radius header__main--style">
            <div class="container">
                <a href="#"><img class="nav__logo" src="<?php echo get_theme_file_uri('/Images/logo2.png'); ?>" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse p-4" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo site_url('/') ?>">صفحه اصلی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">فروشگاه</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                برنامه آزمون و کلاس
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php esc_url(site_url('/about')) ?>">تماس با ما</a>
                        </li>
                    </ul>


                    <?php if (is_user_logged_in()) { ?>
                        <a class="nav-link px-0 ms-4" href="<?php echo wp_logout_url(); ?>">
                            <span><?php echo get_avatar(get_current_user_id(), 30); ?></span>
                            <span>خروج</span>
                        </a>
                    <?php
                    } else { ?>
                        <div class=" position-relative">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ورود یا ثبت نام
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo wp_login_url(); ?>">ورود</a></li>
                                <li><a class="dropdown-item" href="<?php echo wp_registration_url(); ?>">ثبت نام</a></li>
                            </ul>
                        </div>
                    <?php } ?>

                    <button class="btn btn-outline-success ms-4" type="submit">سبد خرید</button>
                    <button type="button" class="btn btn-secondary search__button--trigger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>