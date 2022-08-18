<?php

add_action('rest_api_init', 'shabaaniRegisterSearch');

function shabaaniRegisterSearch()
{
    register_rest_route('shabaani/v1', 'search', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'shabaaniSearchResults',
        'permission_callback' => '__return_true',
    ));
}

function shabaaniSearchResults($data)
{
    $mainQuery = new WP_Query(array(
        'post_type' => array('post', 'event', 'professor', 'program', 'class', 'package', 'examination'),
        's' => sanitize_text_field($data['query'])
    ));

    $results = array(
        'newsEvents' => array(),
        'professors' => array(),
        'programs' => array(),
        'classes' => array(),
        'packages' => array(),
        'examinations' => array(),
    );

    while ($mainQuery->have_posts()) {
        $mainQuery->the_post();

        if (get_post_type() === 'post' || get_post_type() === 'event') {
            if (get_post_type() === 'event') {
                $re = '/\d+/m';
                preg_match_all($re, tr_num(get_field('event_date')), $matches, PREG_SET_ORDER, 0);
                $makeDate = jmktime(0, 0, 0, $matches[1][0], $matches[2][0], $matches[0][0]);
                $day = jdate('d', $makeDate);
                $month = jdate('F', $makeDate);
            }
            if (get_the_post_thumbnail_url()) {
                if (get_post_type() === 'event') {
                    array_push(
                        $results['newsEvents'],
                        array(
                            'title' => get_the_title(),
                            'content' => get_the_content(),
                            'permalink' => get_the_permalink(),
                            'image' =>  get_the_post_thumbnail_url(get_the_ID(), 'smallImage'),
                            'month' => $month,
                            'day' => $day
                        )
                    );
                } else {
                    array_push(
                        $results['newsEvents'],
                        array(
                            'title' => get_the_title(),
                            'content' => get_the_content(),
                            'permalink' => get_the_permalink(),
                            'image' =>  get_the_post_thumbnail_url(get_the_ID(), 'smallImage'),
                        )
                    );
                }
            } else {
                if (get_post_type() === 'event') {
                    array_push(
                        $results['newsEvents'],
                        array(
                            'title' => get_the_title(),
                            'content' => get_the_content(),
                            'permalink' => get_the_permalink(),
                            'month' => $month,
                            'day' => $day
                        )
                    );
                } else {
                    array_push(
                        $results['newsEvents'],
                        array(
                            'title' => get_the_title(),
                            'content' => get_the_content(),
                            'permalink' => get_the_permalink(),
                        )
                    );
                }
            }
        }

        if (get_post_type() === 'professor') {
            array_push(
                $results['professors'],
                array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink()
                )
            );
        }

        if (get_post_type() === 'program') {
            array_push(
                $results['programs'],
                array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink(),
                    'id' => get_the_id()
                )
            );
        }

        if (get_post_type() === 'class') {
            array_push(
                $results['classes'],
                array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink()
                )
            );
        }

        if (get_post_type() === 'package') {
            array_push(
                $results['packages'],
                array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink()
                )
            );
        }

        if (get_post_type() === 'examination') {
            array_push(
                $results['examinations'],
                array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink()
                )
            );
        }
    }

    if ($results['programs']) {
        $programMetaQuery = array('relation' => 'OR');

        foreach ($results['programs'] as $item) {
            array_push($programMetaQuery, array(
                'key' => 'related_courses',
                'compare' => 'LIKE',
                'value' => "{$item['id']}  "
            ));
        }

        $programRelationshipQuery = new WP_Query(array(
            'post_type' => array('professor', 'event'),
            'meta_query' => $programMetaQuery
        ));

        while ($programRelationshipQuery->have_posts()) {
            $programRelationshipQuery->the_post();

            if (get_post_type() === 'post' || get_post_type() === 'event') {
                if (get_post_type() === 'event') {
                    $re = '/\d+/m';
                    preg_match_all($re, tr_num(get_field('event_date')), $matches, PREG_SET_ORDER, 0);
                    $makeDate = jmktime(0, 0, 0, $matches[1][0], $matches[2][0], $matches[0][0]);
                    $day = jdate('d', $makeDate);
                    $month = jdate('F', $makeDate);
                }
                if (get_the_post_thumbnail_url()) {
                    if (get_post_type() === 'event') {
                        array_push(
                            $results['newsEvents'],
                            array(
                                'title' => get_the_title(),
                                'content' => get_the_content(),
                                'permalink' => get_the_permalink(),
                                'image' =>  get_the_post_thumbnail_url(get_the_ID(), 'smallImage'),
                                'month' => $month,
                                'day' => $day
                            )
                        );
                    } else {
                        array_push(
                            $results['newsEvents'],
                            array(
                                'title' => get_the_title(),
                                'content' => get_the_content(),
                                'permalink' => get_the_permalink(),
                                'image' =>  get_the_post_thumbnail_url(get_the_ID(), 'smallImage'),
                            )
                        );
                    }
                } else {
                    if (get_post_type() === 'event') {
                        array_push(
                            $results['newsEvents'],
                            array(
                                'title' => get_the_title(),
                                'content' => get_the_content(),
                                'permalink' => get_the_permalink(),
                                'month' => $month,
                                'day' => $day
                            )
                        );
                    } else {
                        array_push(
                            $results['newsEvents'],
                            array(
                                'title' => get_the_title(),
                                'content' => get_the_content(),
                                'permalink' => get_the_permalink(),
                            )
                        );
                    }
                }
            }

            if (get_post_type() === 'professor') {
                array_push(
                    $results['professors'],
                    array(
                        'title' => get_the_title(),
                        'permalink' => get_the_permalink()
                    )
                );
            }
        }

        $results['professors'] = array_values(array_unique($results['professors'], SORT_REGULAR));
        $results['newsEvents'] = array_values(array_unique($results['newsEvents'], SORT_REGULAR));
    }

    return $results;
}
