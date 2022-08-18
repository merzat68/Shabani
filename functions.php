<?php
include get_template_directory() . '/jdf.php';
include get_template_directory() . '/inc/search-route.php';

function shaabani_files()
{
    wp_enqueue_style('font-awesome', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css');
    wp_enqueue_style('shaabani_main_style', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('shaabani_tailwind_style', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('shaabani_main_extra_style', get_theme_file_uri('./build/index.css'));
    wp_enqueue_script('main-shaabani-js', get_theme_file_uri('./build/index.js'), NULL, '1.0', true);

    wp_localize_script('main-shaabani-js', 'shabaaniData', array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ));
}

add_action('wp_enqueue_scripts', 'shaabani_files');

function shaabani_features()
{
    register_nav_menu('headerMenu', 'Header Menu');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorImage', 400, 260, false);
    add_image_size('smallImage', 150, 150, false);
}

add_action('after_setup_theme', 'shaabani_features');

function shabaani_adjust_queries($query)
{
    if (!is_admin() && is_post_type_archive('program') && $query->is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', 3);
    }

    $today = date('Y-m-d');
    if (!is_admin() && is_post_type_archive('event') && $query->is_main_query()) {
        $query->set('posts_per_page', 2);
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'ASC');
        $query->set('meta_type', 'DATE');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'DATE'
            )
        ));
    }
}

add_action('pre_get_posts', 'shabaani_adjust_queries');


add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend()
{
    $ourCurrentUser = wp_get_current_user();

    if (count($ourCurrentUser->roles) == 1 && $ourCurrentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar()
{
    $ourCurrentUser = wp_get_current_user();

    if (count($ourCurrentUser->roles) == 1 && $ourCurrentUser->roles[0] == 'subscriber') {
        show_admin_bar(false);
    }
}

// Customize Login Screen
add_filter('login_headerurl', 'headerUrl');

function headerUrl()
{
    return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'loginCSS');

function loginCSS()
{
    wp_enqueue_style('font-awesome', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css');
    wp_enqueue_style('shaabani_main_style', get_theme_file_uri('./build/style-index.css'));
    wp_enqueue_style('shaabani_main_extra_style', get_theme_file_uri('./build/index.css'));
    wp_enqueue_script('main-shaabani-js', get_theme_file_uri('./build/index.js'), NULL, '1.0', true);
}

add_filter('login_headertext', 'loginTitle');

function loginTitle()
{
    return get_bloginfo('name');
}

add_filter('ai1wm_exclude_content_from_export', 'ignoreFiles');

function ignoreFiles($exclude_filters)
{
    $exclude_filters[] = 'themes/Shaabani/node_modules';
    return $exclude_filters;
}
