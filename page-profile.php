<?php
if (!is_user_logged_in()) {
    wp_redirect(esc_url(site_url('/')));
    exit;
}

get_header();
?>
<!-- Sidebar -->
<div class="container-fluid h-100 px-5">
    <div class="row my-5 h-100 justify-content-center">
        <div class="col-1 bg-white rounded p-4">
            <p>کلاس</p>
            <p>آزمون</p>
            <p>مالی</p>
        </div>
        <div class="col-10 bg-white rounded p-4 me-5">
            <h4 class="d-inline border-bottom border-dark fw-bolder lh-lg pb-2">لیست آزمون ها</h4>
            <div class="row">
            </div>
        </div>
    </div>

</div>
<!-- Main content-->



<?php
get_footer();
?>