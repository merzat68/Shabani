<?php if (!is_page(46)) { ?>
    <footer class="bottom-0 p-0 container-fluid footer__style">
        <nav class="container py-4 px-0">
            <div class="d-flex align-items-center justify-content-between footer__links--style">
                <a href="#"><img class="nav__logo" src="<?php echo get_theme_file_uri('/Images/logo2.png'); ?>" alt=""></a>
                <div class="d-flex flex-column ">
                    <p class="h4">دسترسی سریع</p>
                    <ul class="d-flex flex-column">
                        <li class="nav-item">
                            <a class=" active" aria-current="page" href="<?php echo site_url(); ?>">صفحه اصلی</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="#">فروشگاه</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="#">برنامه آزمون و کلاس</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="<?php echo site_url('/about') ?>">تماس با ما</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex flex-column">
                    <p class="h4">پشتیبانی</p>
                    <ul class="d-flex flex-column">
                        <li class="nav-item">
                            <a class="active" aria-current="page" href="#">صفحه اصلی</a>
                        </li>
                        <li class="nav-item">
                            <a class=" href=" #">فروشگاه</a>
                        </li>
                        <li class="nav-item">
                            <a class=" href=" #">برنامه آزمون و کلاس</a>
                        </li>
                        <li class="nav-item">
                            <a class=" href=" #">تماس با ما</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </footer>
    </div>
<?php } ?>
<?php wp_footer(); ?>
</body>

</html>